/*
Скрипт gallery (галерея): 27.11.2014
Автор: Алексей Конан
Документация: http://akonan.ru/javascript_photo_gallery
*/
if(!("konan" in window))konan={};
konan.gallery={};
konan.Gallery=function(id){
this.inc=function(a){
  var s=document.createElement("script");
  s.src=a;
  document.getElementsByTagName("head")[0].appendChild(s);
  }
this.path=function(){
  var p, r="", s=document.getElementsByTagName('script');
  for(var i in s)if(s[i].src&&s[i].src.indexOf('gallery.js')>0)p=s[i].src.split("/").slice(0,-1);
  var d=location.href.split("/").slice(0,-1);
  for(var i in d)if(d[i]!=p[i])r+="../";
  for(var i in p)if(d[i]!=p[i])r+=p[i]+"/";
  return r;
  }
this.open=function(k){
  var t=this;
  t.nom=k;
  dialog(t.a[k].src,{'title':t.a[k].title,'id':t.id,'html':'../../html/gallery.html'},function(){t.onload();});
  }
this.next=function(k){
  var n=this.nom+k;
  if(this.a[n])this.open(n);
  }
this.onload=function(){
  document.getElementById(this.id+"_dialog_next").style.display=this.a[this.nom+1]?"inline-block":"none";
  document.getElementById(this.id+"_dialog_prev").style.display=this.a[this.nom-1]?"inline-block":"none";
  }
if(id==undefined){
  var p=this.path();
  if(!("dialog" in window))this.inc(p+"dialog.js");
  return false;
  }
if(konan.gallery[id])return konan.gallery[id];
this.id=id;
this.nom=0;
this.a=[];
}
function gallery(id,n){
u=undefined;
if(id==u)id="gallery";
if(n==u)n="img";
var d=konan.gallery[id]=new konan.Gallery(id);
var a=document.getElementById(id).getElementsByTagName("a");
var i=0,k=0;
while(a[i]){
  if(a[i].className==n){
    d.a[k]={'src':a[i].href,'title':a[i].title};
    a[i].href="javascript:konan.gallery['"+id+"'].open("+k+")";
    k++;
    }
  i++;
  }
}
konan.Gallery();
