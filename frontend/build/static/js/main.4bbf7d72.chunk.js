(this.webpackJsonpfrontend=this.webpackJsonpfrontend||[]).push([[0],{112:function(e,t,a){e.exports=a(194)},117:function(e,t,a){},122:function(e,t,a){},191:function(e,t,a){},192:function(e,t,a){},193:function(e,t,a){},194:function(e,t,a){"use strict";a.r(t);var o=a(0),n=a.n(o),l=a(43),r=a.n(l),c=(a(117),a(24)),d=a(20),s=a(15),i=a(45),m={theme:{themeMode:0,bgcolor:"#dfe6e9",bggood:"#0984e3",color:"#2d3436",goodcolor:"#dfe6e9"}};var u=Object(i.b)((function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:m,t=arguments.length>1?arguments[1]:void 0;return"Alterar tema"===t.type?0===t.themeMode?{theme:{themeMode:1,bgcolor:"#333",bggood:"#222",color:"#dfe6e9",goodcolor:"#dfe6e9"}}:{theme:{themeMode:0,bgcolor:"#dfe6e9",bggood:"#0984e3",color:"#2d3436",goodcolor:"#dfe6e9"}}:e}));a(122);var h=Object(s.b)((function(e){return{theme:e.theme}}))((function(e){var t=e.theme,a=e.dispatch;return n.a.createElement("div",{className:"menu-main",style:{backgroundColor:t.bggood}},n.a.createElement("div",null,n.a.createElement(c.b,{className:"LINK",to:"/",style:{color:t.goodcolor}},"HOME"),n.a.createElement(c.b,{className:"LINK",to:"/create",style:{color:t.goodcolor}},"ADD")),n.a.createElement("div",null,n.a.createElement("p",{className:"LINK",style:{color:t.goodcolor},onClick:function(){return a(function(e){return{type:"Alterar tema",themeMode:e}}(t.themeMode))}},"Alterar tema")))})),p=a(9),b=a.n(p),g=a(28),E=a(29),f=a(32),C=a(30),y=a(33),v=a(111),x=(a(173),a(110)),N=a.n(x).a.create({baseURL:"https://api-backend-lumen.herokuapp.com",crossDomain:!0,headers:{Accept:"application/json","Content-Type":"application/json"}}),D=(a(191),function(e){function t(){var e,a;Object(g.a)(this,t);for(var o=arguments.length,n=new Array(o),l=0;l<o;l++)n[l]=arguments[l];return(a=Object(f.a)(this,(e=Object(C.a)(t)).call.apply(e,[this].concat(n)))).state={PopopDelete:"unwork",mainData:[],idDelete:0},a.popopController=function(e){a.setState({PopopDelete:"delete",idDelete:e})},a.deleteApi=function(){return b.a.async((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,b.a.awrap(N.delete("/api/delete/"+a.state.idDelete));case 2:a.componentDidMount(),a.setState({PopopDelete:"unwork"});case 4:case"end":return e.stop()}}))},a}return Object(y.a)(t,e),Object(E.a)(t,[{key:"componentDidMount",value:function(){var e=this;return b.a.async((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,b.a.awrap(N.get("/api/listPessoas").then((function(t){e.setState({mainData:t.data})})));case 2:case"end":return t.stop()}}))}},{key:"render",value:function(){var e=this,t=this.props.theme;return n.a.createElement("div",{className:"read-main",style:{backgroundColor:t.bgcolor}},n.a.createElement("div",{className:this.state.PopopDelete,style:{color:t.color}},n.a.createElement("div",null,n.a.createElement("h3",null,"TEM CERTEZA?"),n.a.createElement("p",null,"Esse dado ser\xe1 apagado ",n.a.createElement("b",null,"PARA SEMPRE")),n.a.createElement("p",null,"Caso prefira, apenas o oculte.")),n.a.createElement("div",null,n.a.createElement("button",{className:"first-btn-delete",onClick:function(){return e.deleteApi()}},"APAGAR"),n.a.createElement("button",{className:"second-btn-delete"},"OCULTAR"))),n.a.createElement("h3",{style:{color:t.color}},"LISTA DE PESSOAS"),n.a.createElement(v.a,{style:{maxWidth:"100%",paddingBottom:"15px"},className:"read-table"},n.a.createElement("table",null,n.a.createElement("thead",null,n.a.createElement("tr",{style:{backgroundColor:t.bggood}},n.a.createElement("th",{style:{color:t.goodcolor}},"A\xc7\xc3O"),n.a.createElement("th",{style:{color:t.goodcolor}},"NOME"),n.a.createElement("th",{style:{color:t.goodcolor}},"CPF"),n.a.createElement("th",{style:{color:t.goodcolor}},"RG"),n.a.createElement("th",{style:{color:t.goodcolor}},"ENDERE\xc7O"),n.a.createElement("th",{style:{color:t.goodcolor}},"SEXO"),n.a.createElement("th",{style:{color:t.goodcolor}},"NACIONALIDADE"),n.a.createElement("th",{style:{color:t.goodcolor}},"DATA DE NASCIMENTO"),n.a.createElement("th",{style:{color:t.goodcolor}},"DATA DE CADASTRO"))),n.a.createElement("tbody",null,this.state.mainData.map((function(a){return n.a.createElement("tr",{key:a.id},n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color,textDecoration:"none",whiteSpace:"nowrap"}},n.a.createElement("b",{style:{color:"#d63031",textDecoration:"none"},onClick:function(){return e.popopController(a.id)},className:"link"},"DELETAR "),"|",n.a.createElement("b",null,n.a.createElement(c.b,{to:"/update/"+a.id,style:{color:"#0984e3",textDecoration:"none"}}," ALTERAR"))),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},a.nome),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},a.CPF),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},a.RG),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},a.endereco),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},a.sexo?"Masculino":"Feminino"),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},a.nacionalidade),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},a.dataDeNascimento),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},a.dataDeCadastro))}))))))}}]),t}(n.a.Component)),w=Object(s.b)((function(e){return{theme:e.theme}}))(D),k=a(31),O=a(10),A=(a(192),function(e){function t(){var e,a;Object(g.a)(this,t);for(var o=arguments.length,n=new Array(o),l=0;l<o;l++)n[l]=arguments[l];return(a=Object(f.a)(this,(e=Object(C.a)(t)).call.apply(e,[this].concat(n)))).state={data:{sexo:1,CPF:"",ativo:1,dataDeCadastro:"2020-01-12 11:11:11"},themeContent:{hipedBallDirection:"0%"}},a.handleSubmit=function(e){var t;return b.a.async((function(o){for(;;)switch(o.prev=o.next){case 0:return e.preventDefault(),o.next=3,b.a.awrap(Object(O.a)({},a.state.data,{dataDeNascimento:a.state.data.dataDeNascimento+" 11:11:11"}));case 3:t=o.sent,N.post("/api/CadastrarPessoas?nome=".concat(t.nome,"&CPF=").concat(t.CPF,"&dataDeNascimento=").concat(t.dataDeNascimento,"&dataDeCadastro=").concat(t.dataDeCadastro,"&RG=").concat(t.RG,"&endereco=").concat(t.endereco,"&telefone=").concat(t.telefone,"&sexo=").concat(t.sexo,"&nacionalidade=").concat(t.nacionalidade,"&ativo=").concat(t.ativo)).then((function(e){return window.location.href="/"})).catch((function(e){console.log(e.message)}));case 5:case"end":return o.stop()}}))},a.handleChange=function(e){console.log(a.state.data),a.setState({data:Object(O.a)({},a.state.data,Object(k.a)({},e.target.name,e.target.value))})},a.handleChangeRegex=function(e){var t=e.target.value.replace(/\D/g,"").replace(/(\d{3})(\d)/,"$1.$2").replace(/(\d{3})(\d)/,"$1.$2").replace(/(\d{3})(\d{1,2})/,"$1-$2").replace(/(-\d{2})\d+?$/,"$1");a.setState({data:Object(O.a)({},a.state.data,{CPF:t})})},a.hipedBallHandler=function(){"0%"===a.state.themeContent.hipedBallDirection?a.setState({data:Object(O.a)({},a.state.data,{sexo:0}),themeContent:{hipedBallDirection:"50%"}}):a.setState({data:Object(O.a)({},a.state.data,{sexo:1}),themeContent:{hipedBallDirection:"0%"}})},a}return Object(y.a)(t,e),Object(E.a)(t,[{key:"render",value:function(){var e=this.props.theme,t={backgroundColor:e.goodcolor,width:"75px",height:"25px",borderRadius:"75px",position:"relative"},a={position:"absolute",left:this.state.themeContent.hipedBallDirection,transition:"all 1s",width:parseFloat(t.width)/2+"px",backgroundColor:"rgba(0,0,0,.6)",height:t.height,borderRadius:parseFloat(t.width)/2+"px"};return n.a.createElement("div",{className:"read-main",style:{backgroundColor:e.bgcolor}},n.a.createElement("h3",{style:{color:e.color}},"ADICIONE UMA PESSOA"),n.a.createElement("form",{style:{backgroundColor:e.bggood,color:e.goodcolor},className:"create-form",onSubmit:this.handleSubmit,id:"create-form"},n.a.createElement("label",null,"Nome:",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.nome,onChange:this.handleChange,name:"nome",className:"styledInput",placeholder:"Nome"})),n.a.createElement("br",null),n.a.createElement("label",null,"Endere\xe7o",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.endereco,onChange:this.handleChange,name:"endereco",className:"styledInput",placeholder:"Endre\xe7o"})),n.a.createElement("br",null),n.a.createElement("label",null,"Telefone",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.telefone,onChange:this.handleChange,name:"telefone",className:"styledInput",placeholder:"Telefone"})),n.a.createElement("br",null),n.a.createElement("label",null,"Nacionalidade",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.nacionalidade,onChange:this.handleChange,name:"nacionalidade",className:"styledInput",placeholder:"Nacionalidade"})),n.a.createElement("br",null),n.a.createElement("label",null,"CPF:",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},placeholder:"CPF",id:"CreateCPF",onChange:this.handleChangeRegex,value:this.state.data.CPF,maxLength:"14",className:"styledInput"})),n.a.createElement("br",null),n.a.createElement("label",null,"RG",n.a.createElement("br",null),n.a.createElement("input",{type:"number",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.RG,onChange:this.handleChange,name:"RG",className:"styledInput",placeholder:"RG"})),n.a.createElement("br",null),n.a.createElement("label",null,"Data de Nascimento:",n.a.createElement("br",null),n.a.createElement("input",{type:"date",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.dataDeNascimento,onChange:this.handleChange,name:"dataDeNascimento",className:"styledInput"})),n.a.createElement("br",null),n.a.createElement("label",null,"Sexo"),n.a.createElement("br",null),n.a.createElement("div",{className:"content-sexo"},n.a.createElement("div",{className:"hiped",style:t,onClick:this.hipedBallHandler},n.a.createElement("div",{className:"hipedBall",style:a})),n.a.createElement("p",null,1===this.state.data.sexo||void 0===this.state.data.sexo?"Masculino":"Feminino")),n.a.createElement("button",null,"ENVIAR")))}}]),t}(n.a.Component)),B=Object(s.b)((function(e){return{theme:e.theme}}))(A),R=(a(193),function(e){function t(){var e,a;Object(g.a)(this,t);for(var o=arguments.length,n=new Array(o),l=0;l<o;l++)n[l]=arguments[l];return(a=Object(f.a)(this,(e=Object(C.a)(t)).call.apply(e,[this].concat(n)))).state={data:{sexo:1,CPF:"",ativo:1,dataDeCadastro:"2020-01-12 11:11:11"},themeContent:{hipedBallDirection:"0%"}},a.handleSubmit=function(e){var t;return b.a.async((function(o){for(;;)switch(o.prev=o.next){case 0:return e.preventDefault(),o.next=3,b.a.awrap(Object(O.a)({},a.state.data,{dataDeNascimento:a.state.data.dataDeNascimento+" 11:11:11"}));case 3:t=o.sent,N.put("/api/atualizarPessoa/".concat(t.id,"?nome=").concat(t.nome,"&CPF=").concat(t.CPF,"&dataDeNascimento=").concat(t.dataDeNascimento,"&dataDeCadastro=").concat(t.dataDeCadastro,"&RG=").concat(t.RG,"&endereco=").concat(t.endereco,"&telefone=").concat(t.telefone,"&sexo=").concat(t.sexo,"&nacionalidade=").concat(t.nacionalidade,"&ativo=").concat(t.ativo)).then((function(e){return window.location.href="/"})).catch((function(e){console.log(e.message)}));case 5:case"end":return o.stop()}}))},a.handleChange=function(e){console.log(a.state.data),a.setState({data:Object(O.a)({},a.state.data,Object(k.a)({},e.target.name,e.target.value))})},a.handleChangeRegex=function(e){var t=e.target.value.replace(/\D/g,"").replace(/(\d{3})(\d)/,"$1.$2").replace(/(\d{3})(\d)/,"$1.$2").replace(/(\d{3})(\d{1,2})/,"$1-$2").replace(/(-\d{2})\d+?$/,"$1");a.setState({data:Object(O.a)({},a.state.data,{CPF:t})})},a.hipedBallHandler=function(){"0%"===a.state.themeContent.hipedBallDirection?a.setState({data:Object(O.a)({},a.state.data,{sexo:0}),themeContent:{hipedBallDirection:"50%"}}):a.setState({data:Object(O.a)({},a.state.data,{sexo:1}),themeContent:{hipedBallDirection:"0%"}})},a}return Object(y.a)(t,e),Object(E.a)(t,[{key:"componentDidMount",value:function(){var e,t=this;return b.a.async((function(a){for(;;)switch(a.prev=a.next){case 0:return e=this.props.match.params.id,a.next=3,b.a.awrap(N.get("/api/editarPessoa/".concat(e)).then((function(a){return t.setState({data:{id:e,nome:a.data.nome,CPF:a.data.CPF,dataDeNascimento:a.data.dataDeNascimento,dataDeCadastro:a.data.dataDeCadastro,RG:a.data.RG,endereco:a.data.endereco,telefone:a.data.telefone,sexo:a.data.sexo,nacionalidade:a.data.nacionalidade,ativo:a.data.ativo}})})));case 3:console.log(this.state.data);case 4:case"end":return a.stop()}}),null,this)}},{key:"render",value:function(){var e=this.props.theme,t={backgroundColor:e.goodcolor,width:"75px",height:"25px",borderRadius:"75px",position:"relative"},a={position:"absolute",left:this.state.themeContent.hipedBallDirection,transition:"all 1s",width:parseFloat(t.width)/2+"px",backgroundColor:"rgba(0,0,0,.6)",height:t.height,borderRadius:parseFloat(t.width)/2+"px"};return n.a.createElement("div",{className:"read-main",style:{backgroundColor:e.bgcolor}},n.a.createElement("h3",{style:{color:e.color}},"ADICIONE UMA PESSOA"),n.a.createElement("form",{style:{backgroundColor:e.bggood,color:e.goodcolor},className:"create-form",onSubmit:this.handleSubmit,id:"create-form"},n.a.createElement("label",null,"Nome:",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.nome,onChange:this.handleChange,name:"nome",className:"styledInput",placeholder:"Nome"})),n.a.createElement("br",null),n.a.createElement("label",null,"Endere\xe7o",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.endereco,onChange:this.handleChange,name:"endereco",className:"styledInput",placeholder:"Endre\xe7o"})),n.a.createElement("br",null),n.a.createElement("label",null,"Telefone",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.telefone,onChange:this.handleChange,name:"telefone",className:"styledInput",placeholder:"Telefone"})),n.a.createElement("br",null),n.a.createElement("label",null,"Nacionalidade",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.nacionalidade,onChange:this.handleChange,name:"nacionalidade",className:"styledInput",placeholder:"Nacionalidade"})),n.a.createElement("br",null),n.a.createElement("label",null,"CPF:",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},placeholder:"CPF",id:"CreateCPF",onChange:this.handleChangeRegex,value:this.state.data.CPF,maxLength:"14",className:"styledInput"})),n.a.createElement("br",null),n.a.createElement("label",null,"RG",n.a.createElement("br",null),n.a.createElement("input",{type:"number",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.RG,onChange:this.handleChange,name:"RG",className:"styledInput",placeholder:"RG"})),n.a.createElement("br",null),n.a.createElement("label",null,"Data de Nascimento:",n.a.createElement("br",null),n.a.createElement("input",{type:"date",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.data.dataDeNascimento,onChange:this.handleChange,name:"dataDeNascimento",className:"styledInput"})),n.a.createElement("br",null),n.a.createElement("label",null,"Sexo"),n.a.createElement("br",null),n.a.createElement("div",{className:"content-sexo"},n.a.createElement("div",{className:"hiped",style:t,onClick:this.hipedBallHandler},n.a.createElement("div",{className:"hipedBall",style:a})),n.a.createElement("p",null,1===this.state.data.sexo||void 0===this.state.data.sexo?"Masculino":"Feminino")),n.a.createElement("button",null,"ENVIAR")))}}]),t}(n.a.Component)),S=Object(s.b)((function(e){return{theme:e.theme}}))(R);var j=function(){return n.a.createElement(c.a,null,n.a.createElement(s.a,{store:u},n.a.createElement(d.c,null,n.a.createElement(d.a,{path:"/",component:h})),n.a.createElement(d.c,null,n.a.createElement(d.a,{exact:!0,path:"/",component:w}),n.a.createElement(d.a,{path:"/create",component:B}),n.a.createElement(d.a,{path:"/update/:id",component:S}))))},P=Boolean("localhost"===window.location.hostname||"[::1]"===window.location.hostname||window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));function I(e,t){navigator.serviceWorker.register(e).then((function(e){e.onupdatefound=function(){var a=e.installing;null!=a&&(a.onstatechange=function(){"installed"===a.state&&(navigator.serviceWorker.controller?(console.log("New content is available and will be used when all tabs for this page are closed. See https://bit.ly/CRA-PWA."),t&&t.onUpdate&&t.onUpdate(e)):(console.log("Content is cached for offline use."),t&&t.onSuccess&&t.onSuccess(e)))})}})).catch((function(e){console.error("Error during service worker registration:",e)}))}r.a.render(n.a.createElement(j,null),document.getElementById("root")),function(e){if("serviceWorker"in navigator){if(new URL("",window.location.href).origin!==window.location.origin)return;window.addEventListener("load",(function(){var t="".concat("","/service-worker.js");P?(!function(e,t){fetch(e,{headers:{"Service-Worker":"script"}}).then((function(a){var o=a.headers.get("content-type");404===a.status||null!=o&&-1===o.indexOf("javascript")?navigator.serviceWorker.ready.then((function(e){e.unregister().then((function(){window.location.reload()}))})):I(e,t)})).catch((function(){console.log("No internet connection found. App is running in offline mode.")}))}(t,e),navigator.serviceWorker.ready.then((function(){console.log("This web app is being served cache-first by a service worker. To learn more, visit https://bit.ly/CRA-PWA")}))):I(t,e)}))}}()}},[[112,1,2]]]);
//# sourceMappingURL=main.4bbf7d72.chunk.js.map