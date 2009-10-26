gm = google.maps;

function mapModule(){

    this.initMap();
}
ModuleManager.add(mapModule);

mapModule.prototype.initMap = function(){
    var latlng = new gm.LatLng(55.043561639001645, 36.627886718750005);
    var opt = {
        zoom: 8,
        center: latlng,
        mapTypeId: gm.MapTypeId.ROADMAP
    };
    this.map = new gm.Map($("#map_canvas").get(0), opt);

    this.loadData();
}

mapModule.prototype.loadData = function(){
    var self = this;
    app.getJSON('/collector/data', function(data){
        $.each(data.locations,function(){
            new ht_location(self,{
                title:this.name,
                id:this.id,
                position:new gm.LatLng(parseFloat(this.lat),parseFloat(this.lng))
            });
        });
        $.each(data.routes,function(){
            self.createRoute({
                title:this.name,
                id:this.id,
                points:this.points
            });
        });
    });
}

mapModule.prototype.createRoute = function(opt){
    var points = opt.points.split("|");
    delete opt.points;

    opt.path = [];
    var point;
    $.each(points,function(){
        point = this.split(';')
        opt.path[opt.path.length] = new gm.LatLng(parseFloat(point[0]),parseFloat(point[1]));
    });
    
    opt.strokeColor = '#f30';
    opt.strokeOpacity = 0.5;
    opt.strokeWeight = 2;    
    var route = new ht_route(this,opt);
}

mapModule.prototype.createPoly = function(opt){
    opt.map = this.map;
    return new gm.Polyline(opt);
}

mapModule.prototype.createMarker = function(opt){
    opt.map = this.map;
    return new gm.Marker(opt);
}

mapModule.prototype.removeMarker = function(marker){
    marker.infoWindow && marker.infoWindow.close();
    marker.setMap(null);
}

mapModule.prototype.setCenter = function(point){
    this.map.setCenter(point);
}

mapModule.prototype.showLoader = function(point,html){    
    return new mapOverlay(point,html,this.map,'overlayImage');
}




function mapOverlay(point,html,map,overlay){
    this.point = point;
    this.html = html;
    this.overlay = overlay;
    this.div = null;
    this.setMap(map);
}

mapOverlay.prototype = new gm.OverlayView();
mapOverlay.prototype.constructor = mapOverlay;
mapOverlay.prototype.onAdd = function(){
    var div = document.createElement('DIV');
    div.innerHTML = this.html;
    div.style.border = "0px solid none";
    div.style.position = "absolute";
    this.div = div;

    var panes = this.getPanes();
    panes[this.overlay].appendChild(div);
}
mapOverlay.prototype.draw = function(){
    var overlayProjection = this.getProjection();
    
    var point = overlayProjection.fromLatLngToDivPixel(this.point);

    this.div.style.left = (point.x) + "px";
    this.div.style.top = (point.y) + "px";

}
mapOverlay.prototype.onRemove = function(){
    this.div.parentNode.removeChild(this.div);
    this.div = null;
}
mapOverlay.prototype.remove = function(){
    this.setMap(null);
}



/**
 * all about route here
 */
function ht_route(mm,opt){
    this.mm = mm;
    this.poly = mm.createPoly(opt);
    this.initListeners();
}
ht_route.prototype.initListeners = function(){
    this.listeners = {};
    this.addListenerClick();
    this.listeners.move = gm.event.addListener(this.poly,'mousemove',this.onMove.delegate(this));
}
ht_route.prototype.addListenerClick = function(){
    this.listeners.click = gm.event.addListener(this.poly,'click',this.onClick.delegate(this));
}
ht_route.prototype.onMove = function(){
    this.poly.setOptions({
        strokeColor: '#39d',
        strokeOpacity: 0.8,
        strokeWeight: 8
    });
    this.poly.overTime = new Date();
    setTimeout(this.onOut.delegate(this), 1000);
}
ht_route.prototype.onOut = function(){
    if(new Date()-this.poly.overTime > 900){
        this.poly.setOptions({
            strokeColor: '#f30',
            strokeOpacity: 0.5,
            strokeWeight: 2
        });
    }
}
ht_route.prototype.onClick = function(e){
    var loader = this.mm.showLoader(e.latLng,'<img src="/images/loader-small.gif" />');
    gm.event.removeListener(this.listeners.click);
    app.getForm('/route/show/id/'+this.poly.id,this.showInfo.delegate(this,loader,e.latLng));
}
ht_route.prototype.showInfo =  function(html,loader,point){
    this.openInfo(html,point);
    loader.remove();
}
ht_route.prototype.openInfo= function(html,position){
    this.poly.infoWindow = new gm.InfoWindow({
        content: html,
        position: position
    });
    gm.event.addListener(this.poly.infoWindow,'closeclick',this.addListenerClick.delegate(this));
    this.poly.infoWindow.open(this.mm.map);
}


/**
 * all about location here
 */
function ht_location(mm,opt){
    this.mm = mm;
    this.marker = mm.createMarker(opt);
    this.initListeners();
}

ht_location.prototype.initListeners = function(){
    this.listeners = {};
    this.addListenerClick();
}
ht_location.prototype.addListenerClick = function(){
    this.listeners.click = gm.event.addListener(this.marker,'click',this.onClick.delegate(this));
}
ht_location.prototype.onClick = function(){
    var loader = this.mm.showLoader(this.marker.getPosition(),'<img src="/images/loader-small.gif" />');
    gm.event.removeListener(this.listeners.click);
    app.getForm('/location/show/id/'+this.marker.id,this.showInfo.delegate(this,loader));
}
ht_location.prototype.showInfo =  function(html,loader){
    this.openInfo(html);    
    loader.remove();
}
ht_location.prototype.openInfo= function(html){
    this.marker.infoWindow = new gm.InfoWindow({
        content: html
    });
    gm.event.addListener(this.marker.infoWindow,'closeclick',this.addListenerClick.delegate(this));
    this.marker.infoWindow.open(this.mm.map,this.marker);
}