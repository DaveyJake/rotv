//$("#today").ready(function(){function a(){var a=new Date,e=new Array,n=new Array;e[0]="Sunday",e[1]="Monday",e[2]="Tuesday",e[3]="Wednesday",e[4]="Thursday",e[5]="Friday",e[6]="Saturday",n[0]="Jan.",n[1]="Feb.",n[2]="March",n[3]="April",n[4]="May",n[5]="June",n[6]="July",n[7]="Aug.",n[8]="Sept.",n[9]="Oct.",n[10]="Nov.",n[11]="Dec.";var y=e[a.getDay()],t=n[a.getMonth()],d=a.getDate(),r=[y+",",t,d].join(" ");$("#today").append(r)}a()});

//$(document).ready(function(){function a(){function a(){return(o.length=3)?o.slice(0,3)+".":o}function i(){if("Nov"==o&&"Jan"==f||"Dec"==o&&"Jan"==f||"Dec"==o&&"Feb"==f){t.setFullYear(y,d.indexOf(f),p);var a=n[t.getDay()],e=d[t.getMonth()],i=t.getDate(),l=[a+",",e+".",i+",",y].join(" ");$("#final-day").append(l)}else{t.setFullYear(u,d.indexOf(f),p),console.log(t);var a=n[t.getDay()],e=d[t.getMonth()],i=t.getDate(),r=[a+",",e+".",i].join(" ");$("#final-day").append(r)}}var l=n[e.getDay()],o=d[e.getMonth()],r=e.getDate(),u=e.getFullYear(),y=u+1,c=[l+",",a(),r].join(" ");$("#today").append(c);var g=/[A-Za-z]{3}/,h=/\d+/,s=/[A-Za-z]+\s\d+/,D=$("li:last-child > p:last-child").html();D=D.match(s).join("");var f=D.match(g).join(""),p=D.match(h).join("");i()}var e=new Date,t=new Date,n=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],d=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];a()});

$(document).ready(function(){function a(){function a(){return"May"!=r?r+".":r}function i(){function a(){return"May"!=i?i+".":i}if("Nov"==r&&"Jan"==p||"Dec"==r&&"Jan"==p||"Dec"==r&&"Feb"==p){n.setFullYear(l,d.indexOf(p),s);var e=t[n.getDay()],i=d[n.getMonth()],o=n.getDate(),u=[e+",",a(),o+",",l].join(" ");$("#final-day").append(u)}else{n.setFullYear(y,d.indexOf(p),s);var e=t[n.getDay()],i=d[n.getMonth()],o=n.getDate(),c=[e+",",a(),o].join(" ");$("#final-day").append(c)}}var o=t[e.getDay()],r=d[e.getMonth()],u=e.getDate(),y=e.getFullYear(),l=y+1,c=[o+",",a(),u].join(" ");$("#today").append(c);var g=/[A-Za-z]{3}/,D=/\d+/,f=/[A-Za-z]+\s\d+/,h=$("li:last-child > p:last-child").html();h=h.match(f).join("");var p=h.match(g).join(""),s=h.match(D).join("");i()}var e=new Date,n=new Date,t=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],d=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];a()});