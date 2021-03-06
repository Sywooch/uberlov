function eventModule(){
    this.menu = null;
    this.bar = null;
    this.location = null;
    this.event = null;
    this.infoWindow = null;
    this.listeners = {};
}

eventModule.name = 'eventModule';
ModuleManager.add(eventModule);


eventModule.prototype.afterInit = function(){
    fb('initing... eventModule' )
    this.mm = app.getModule('mapModule');
    this.initMenu();
}


eventModule.prototype.initMenu = function(){
    this.menu = {
        link: $('#new_event').attr("href","#").click(this.startEdit.delegate(this))
    };
}

eventModule.prototype.startEdit = function(){
    if(this.mm.getEditor() != this){
        this.mm.cancelEdit();
        this.mm.setEditor(this);
        this.menu.link.addClass('disabled');

        this.mm.handlers.onLocationClick = this.getOnLocationClick().delegate(this)

        this.barCreate();
        this.barSetMsg('Выберите место или добавьте новое');
    }
    return false;
}

eventModule.prototype.cancelEdit = function(){
    this.mm.handlers.onLocationClick = this.mm.getOnLocationClick().delegate(this.mm)
    this.barRemove();
    this.menu.link.removeClass('disabled');
}


eventModule.prototype.getOnLocationClick =  function(){
    var self  = this;
    return function(location){
        app.redirect('/event/new/'+location.id);
    //        self.location = location;
    //        var loader = this.mm.showLoader(location.marker.getPosition());
    //        app.getForm('/event/new/location/'+location.id,this.showForm.delegate(this,location.marker,loader));
    }
}

eventModule.prototype.showForm = function(form,marker,loader){
    this.infoWindow = this.mm.openInfo(marker.getPosition(),this.addSubmitHandler(form));
    
    var date = $('#profit_date');
    date.DatePicker({
        format:'d.m.Y',
        date: date.val(),
        current: date.val(),
        starts: 1,
        position: 'r',
        onChange: function(formated, dates){
            date.val(formated);
            date.DatePickerHide();
        }
    });

    var self = this;
    $('#addProfitDetail').click(function(){
        $('.tableContainer tbody').append('<tr fish="'+$('#profit_fishes').val()+'" styles="'+$('#profit_styles').val()+'" qty="'+$('#profit_qty').val()+'"><td>'+$('#profit_fishes option:selected').text()+'</td><td>'+ $('#profit_styles option:selected').text()+'</td><td>'+$('#profit_qty').val()+'</td><td><input type="button" value="&nbsp;-&nbsp;" class="button removeProfitDetail"></td></tr>');
        self.countDetailQty();
        return false;
    });

    loader.remove();
}

eventModule.prototype.addSubmitHandler = function(form){
    var self = this;

    $('#profit_location_id', form).val(self.location.id);
    
    app.formSubmiter({
        form: form,
        response: function(newForm){
            var matches = newForm.match(/^(\d+)\|(.*)/)

            if(matches && matches.length==3){

            }else{
                self.infoWindow.setContent(self.addSubmitHandler(app.formatHtml(newForm)));
            }
        }
    });
    
    return form;
}

eventModule.prototype.onSaveChange = function(disabled){
    this.barSaveDisabled(disabled);
}

eventModule.prototype.barCreate = function(){
    var bar = this.mm.updateBar('<img class="mapIcon" src="' + app.url('/images/event.png') + '"/><span id="bar_msg"></span></span><input id="bar_save" class="map_button disabled" type="button" value="Сохранить"/><input id="bar_cancel" class="map_button" type="button" value="Отмена"/>');
    this.bar = {
        msg: $('#bar_msg',bar),
        save: $('#bar_save',bar),
        cancel: $('#bar_cancel',bar)
        .click(this.mm.cancelEdit.delegate(this.mm))
    };
}
eventModule.prototype.barRemove = function(){
    this.bar = null;
    this.mm.updateBar();
}
eventModule.prototype.barSetMsg = function(text){
    this.bar.msg.text(text);
    this.mm.centerBar();
}
eventModule.prototype.barSaveDisabled = function(disabled){
    if(disabled){
        this.bar.save.addClass('disabled').unbind('click');
    }else{
        this.bar.save.removeClass('disabled').click(this.event.onClick.delegate(this.event));
    }
}
