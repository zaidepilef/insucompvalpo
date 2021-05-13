(this.webpackJsonpbmical=this.webpackJsonpbmical||[]).push([[0],{157:function(e,t,a){"use strict";a.r(t);var n=a(0),r=a.n(n),l=a(48),c=a.n(l),i=(a(58),a(52)),o=a(11),m=a(49),s=(a(61),a(32),a(10)),d=a(28),u={weight:"",height:"",date:""},h=function(e){var t=e.change,a=Object(n.useState)(u),l=Object(o.a)(a,2),c=l[0],i=l[1],m=function(e){var t,a=e.target,n=a.value,r=a.name;n>999&&(n=999);var l=(new Date).toLocaleString().split(",")[0];i(Object(d.a)(Object(d.a)({},c),{},(t={},Object(s.a)(t,r,n),Object(s.a)(t,"date",l),t)))};return r.a.createElement(r.a.Fragment,null,r.a.createElement("div",{className:"row"},r.a.createElement("div",{className:"col m6 s12"},r.a.createElement("label",{htmlFor:"weight"},"Weight (in kg)"),r.a.createElement("input",{id:"weight",name:"weight",type:"number",min:"1",max:"999",placeholder:"50",value:c.weight,onChange:m})),r.a.createElement("div",{className:"col m6 s12"},r.a.createElement("label",{htmlFor:"height"},"Height (in cm)"),r.a.createElement("input",{id:"height",name:"height",type:"number",min:"1",max:"999",placeholder:"176",value:c.height,onChange:m}))),r.a.createElement("div",{className:"center"},r.a.createElement("button",{id:"bmi-btn",className:"calculate-btn",type:"button",disabled:""===c.weight||""===c.height,onClick:function(){t(c),i(u)}},"Calculate BMI")))},g=function(e){var t=e.weight,a=e.height,n=e.id,l=e.date,c=e.bmi,i=e.deleteCard;return r.a.createElement("div",{className:"col m6 s12"},r.a.createElement("div",{className:"card"},r.a.createElement("div",{className:"card-content"},r.a.createElement("span",{className:"card-title","data-test":"bmi"},"BMI: ",c),r.a.createElement("div",{className:"card-data"},r.a.createElement("span",{"data-test":"weight"},"Weight: ",t," kg"),r.a.createElement("span",{"data-test":"height"},"Height: ",a," cm"),r.a.createElement("span",{"data-test":"date"},"Date: ",l)),r.a.createElement("button",{className:"delete-btn",onClick:function(){i(n)}},"X"))))},b=a(50),E=function(e){var t=e.labelData,a=e.bmiData;return r.a.createElement(r.a.Fragment,null,r.a.createElement(b.a,{data:function(e){var n=e.getContext("2d").createLinearGradient(63,81,181,700);return n.addColorStop(0,"#929dd9"),n.addColorStop(1,"#172b4d"),{labels:t,datasets:[{label:"BMI",data:a,backgroundColor:n,borderColor:"#3F51B5",pointRadius:6,pointHoverRadius:8,pointHoverBorderColor:"white",pointHoverBorderWidth:2}]}},options:{responsive:!0,scales:{xAxes:[{scaleLabel:{display:!0,labelString:"Date",fontSize:18,fontColor:"white"},gridLines:{display:!1,color:"white"},ticks:{fontColor:"white",fontSize:16}}],yAxes:[{scaleLabel:{display:!0,labelString:"BMI",fontSize:18,fontColor:"white"},gridLines:{display:!1,color:"white"},ticks:{fontColor:"white",fontSize:16,beginAtZero:!0}}]},tooltips:{titleFontSize:13,bodyFontSize:13}}}))},f=function(e){if(localStorage)try{return JSON.parse(localStorage.getItem(e))}catch(t){console.error("Error getting item ".concat(e," from localStorage"),t)}},v=function(e,t){if(localStorage)try{return localStorage.setItem(e,JSON.stringify(t))}catch(a){console.error("Error storing item ".concat(e," to localStorage"),a)}},p=function(){var e=Object(n.useState)((function(){return f("data")||[]})),t=Object(o.a)(e,2),a=t[0],l=t[1],c=Object(n.useState)({}),s=Object(o.a)(c,2),d=s[0],u=s[1];Object(n.useEffect)((function(){v("data",a);var e=a.map((function(e){return e.date})),t=a.map((function(e){return e.bmi}));u({date:e,bmi:t})}),[a]);var b=function(e){v("lastState",a);var t=a.filter((function(t){return t.id!==e}));l(t)};return r.a.createElement("div",{className:"container"},r.a.createElement("div",{className:"row center"},r.a.createElement("h1",{className:"white-text"}," BMI Tracker ")),r.a.createElement("div",{className:"row"},r.a.createElement("div",{className:"col m12 s12"},r.a.createElement(h,{change:function(e){var t=e.height/100;e.bmi=(e.weight/(t*t)).toFixed(2),e.id=Object(m.v4)();var n=[].concat(Object(i.a)(a),[e]),r=n.length;r>7&&(n=n.slice(1,r)),l(n)}}),r.a.createElement(E,{labelData:d.date,bmiData:d.bmi}),r.a.createElement("div",null,r.a.createElement("div",{className:"row center"},r.a.createElement("h4",{className:"white-text"},"7 Day Data")),r.a.createElement("div",{className:"data-container row"},a.length>0?r.a.createElement(r.a.Fragment,null,a.map((function(e){return r.a.createElement(g,{key:e.id,id:e.id,weight:e.weight,height:e.height,date:e.date,bmi:e.bmi,deleteCard:b})}))):r.a.createElement("div",{className:"center white-text"},"No log found"))),null!==f("lastState")?r.a.createElement("div",{className:"center"},r.a.createElement("button",{className:"calculate-btn",onClick:function(){l(f("lastState"))}},"Undo")):"")))};c.a.render(r.a.createElement(p,null),document.getElementById("root"))},32:function(e,t,a){},53:function(e,t,a){e.exports=a(157)},58:function(e,t,a){}},[[53,1,2]]]);
//# sourceMappingURL=main.cc8a72b6.chunk.js.map