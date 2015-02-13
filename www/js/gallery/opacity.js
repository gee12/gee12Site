/*
Прозрачность элементов: 10.09.2014
Автор: Алексей Конан
Документация: http://akonan.ru/?id=25
*/
if(!("konan" in window))konan={};
konan.opacity=[];
konan.Opacity=function(id){
var t=this;
var e=t.element=typeof(id)=='string'?document.getElementById(id):id;
for(var n in konan.opacity)if(konan.opacity[n].element==e)return konan.opacity[n];
konan.opacity.push(t);
t.opacity=e.currentStyle?e.currentStyle["opacity"]*100:window.getComputedStyle(e,"").getPropertyValue("opacity")*100;
t.actual=t.opacity;
t.final=t.time=0;
t.dt=40;
t.alpha=function(fn){
  clearTimeout(t.timer);
  var u=undefined;
  var a=arguments;
  var s=t.element.style;
  if(t.time==u)t.time=0;
  var n=t.time/t.dt<1?1:t.time/t.dt;
  t.actual+=(t.final-t.actual)/n;
  t.time-=t.dt;
  t.opacity=Math.round(t.actual);
  s.opacity!=u?s.opacity=t.opacity/100:s.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+t.opacity+")";
  if(t.opacity!=t.final)t.timer=setTimeout(function(){t.alpha.apply(t,a)},t.dt);
  else{
    t.actual=t.opacity;
    if(fn!=u)return fn.apply(fn,Array.prototype.slice.call(a,1));
    }
  }
}
function opacity(id,a,t,fn){
var e=new konan.Opacity(id);
e.final=a;
e.time=typeof(t)=='string'?Math.round(Math.abs(a-e.actual)*1000/parseInt(t)):t;
e.dt=100;
e.alpha.apply(e,Array.prototype.slice.call(arguments,3));
}
