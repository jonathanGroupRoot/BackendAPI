(this.webpackJsonpfrontend=this.webpackJsonpfrontend||[]).push([[0],{112:function(e,t,o){e.exports=o(193)},117:function(e,t,o){},122:function(e,t,o){},191:function(e,t,o){},192:function(e,t,o){},193:function(e,t,o){"use strict";o.r(t);var a=o(0),n=o.n(a),l=o(37),r=o.n(l),c=(o(117),o(23)),s=o(18),d=o(17),i=o(39),m={theme:{themeMode:0,bgcolor:"#dfe6e9",bggood:"#0984e3",color:"#2d3436",goodcolor:"#dfe6e9"}};var u=Object(i.b)((function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:m,t=arguments.length>1?arguments[1]:void 0;return"Alterar tema"===t.type?0===t.themeMode?{theme:{themeMode:1,bgcolor:"#333",bggood:"#222",color:"#dfe6e9",goodcolor:"#dfe6e9"}}:{theme:{themeMode:0,bgcolor:"#dfe6e9",bggood:"#0984e3",color:"#2d3436",goodcolor:"#dfe6e9"}}:e}));o(122);var h=Object(d.b)((function(e){return{theme:e.theme}}))((function(e){var t=e.theme,o=e.dispatch;return n.a.createElement("div",{className:"menu-main",style:{backgroundColor:t.bggood}},n.a.createElement("div",null,n.a.createElement(c.b,{className:"LINK",to:"/",style:{color:t.goodcolor}},"HOME"),n.a.createElement(c.b,{className:"LINK",to:"/create",style:{color:t.goodcolor}},"ADD")),n.a.createElement("div",null,n.a.createElement("p",{className:"LINK",style:{color:t.goodcolor},onClick:function(){return o(function(e){return{type:"Alterar tema",themeMode:e}}(t.themeMode))}},"Alterar tema")))})),p=o(19),b=o.n(p),g=o(40),E=o(41),f=o(44),y=o(42),v=o(45),C=o(111),x=(o(173),o(110)),D=o.n(x).a.create({baseURL:"https://api-backend-lumen.herokuapp.com",crossDomain:!0,headers:{Accept:"application/json","Content-Type":"application/json"}}),N=(o(191),function(e){function t(){var e,o;Object(g.a)(this,t);for(var a=arguments.length,n=new Array(a),l=0;l<a;l++)n[l]=arguments[l];return(o=Object(f.a)(this,(e=Object(y.a)(t)).call.apply(e,[this].concat(n)))).state={PopopDelete:"unwork",mainData:[],idDelete:0},o.popopController=function(e){o.setState({PopopDelete:"delete",idDelete:e})},o.deleteApi=function(){return b.a.async((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,b.a.awrap(D.delete("/api/delete/"+o.state.idDelete));case 2:o.componentDidMount(),o.setState({PopopDelete:"unwork"});case 4:case"end":return e.stop()}}))},o}return Object(v.a)(t,e),Object(E.a)(t,[{key:"componentDidMount",value:function(){var e=this;return b.a.async((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,b.a.awrap(D.get("/api/listPessoas").then((function(t){e.setState({mainData:t.data})})));case 2:case"end":return t.stop()}}))}},{key:"render",value:function(){var e=this,t=this.props.theme;return n.a.createElement("div",{className:"read-main",style:{backgroundColor:t.bgcolor}},n.a.createElement("div",{className:this.state.PopopDelete,style:{color:t.color}},n.a.createElement("div",null,n.a.createElement("h3",null,"TEM CERTEZA?"),n.a.createElement("p",null,"Esse dado ser\xe1 apagado ",n.a.createElement("b",null,"PARA SEMPRE")),n.a.createElement("p",null,"Caso prefira, apenas o oculte.")),n.a.createElement("div",null,n.a.createElement("button",{className:"first-btn-delete",onClick:function(){return e.deleteApi()}},"APAGAR"),n.a.createElement("button",{className:"second-btn-delete"},"OCULTAR"))),n.a.createElement("h3",{style:{color:t.color}},"LISTA DE PESSOAS"),n.a.createElement(C.a,{style:{maxWidth:"100%",paddingBottom:"15px"},className:"read-table"},n.a.createElement("table",null,n.a.createElement("thead",null,n.a.createElement("tr",{style:{backgroundColor:t.bggood}},n.a.createElement("th",{style:{color:t.goodcolor}},"A\xc7\xc3O"),n.a.createElement("th",{style:{color:t.goodcolor}},"NOME"),n.a.createElement("th",{style:{color:t.goodcolor}},"CPF"),n.a.createElement("th",{style:{color:t.goodcolor}},"RG"),n.a.createElement("th",{style:{color:t.goodcolor}},"ENDERE\xc7O"),n.a.createElement("th",{style:{color:t.goodcolor}},"SEXO"),n.a.createElement("th",{style:{color:t.goodcolor}},"NACIONALIDADE"),n.a.createElement("th",{style:{color:t.goodcolor}},"DATA DE NASCIMENTO"),n.a.createElement("th",{style:{color:t.goodcolor}},"DATA DE CADASTRO"))),n.a.createElement("tbody",null,this.state.mainData.map((function(o){return n.a.createElement("tr",{key:o.id},n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color,textDecoration:"none",whiteSpace:"nowrap"}},n.a.createElement("b",{style:{color:"#d63031",textDecoration:"none"},onClick:function(){return e.popopController(o.id)},className:"link"},"DELETAR "),"|",n.a.createElement("b",null,n.a.createElement(c.b,{to:"/update/"+o.id,style:{color:"#0984e3",textDecoration:"none"}}," ALTERAR"))),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},o.nome),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},o.CPF),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},o.RG),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},o.endereco),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},o.sexo?"Masculino":"Feminino"),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},o.nacionalidade),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},o.dataDeNascimento),n.a.createElement("td",{style:{color:t.color,borderBottom:"1px solid "+t.color}},o.dataDeCadastro))}))))))}}]),t}(n.a.Component)),A=Object(d.b)((function(e){return{theme:e.theme}}))(N),w=o(43),k=o(27),O=(o(192),function(e){function t(){var e,o;Object(g.a)(this,t);for(var a=arguments.length,n=new Array(a),l=0;l<a;l++)n[l]=arguments[l];return(o=Object(f.a)(this,(e=Object(y.a)(t)).call.apply(e,[this].concat(n)))).state={data:{sexo:1,CPF:"",ativo:1,dataDeCadastro:"2020-01-12 11:11:11"},themeContent:{hipedBallDirection:"0%"}},o.handleSubmit=function(e){var t;return b.a.async((function(a){for(;;)switch(a.prev=a.next){case 0:return e.preventDefault(),a.next=3,b.a.awrap(Object(k.a)({},o.state.data,{dataDeNascimento:o.state.data.dataDeNascimento+" 11:11:11"}));case 3:t=a.sent,D.post("/api/CadastrarPessoas?nome=".concat(t.nome,"&CPF=").concat(t.CPF,"&dataDeNascimento=").concat(t.dataDeNascimento,"&dataDeCadastro=").concat(t.dataDeCadastro,"&RG=").concat(t.RG,"&endereco=").concat(t.endereco,"&telefone=").concat(t.telefone,"&sexo=").concat(t.sexo,"&nacionalidade=").concat(t.nacionalidade,"&ativo=").concat(t.ativo)).then((function(e){return console.log(e.data)})).catch((function(e){console.log(e.message)}));case 5:case"end":return a.stop()}}))},o.handleChange=function(e){console.log(o.state.data),o.setState({data:Object(k.a)({},o.state.data,Object(w.a)({},e.target.name,e.target.value))})},o.handleChangeRegex=function(e){var t=e.target.value.replace(/\D/g,"").replace(/(\d{3})(\d)/,"$1.$2").replace(/(\d{3})(\d)/,"$1.$2").replace(/(\d{3})(\d{1,2})/,"$1-$2").replace(/(-\d{2})\d+?$/,"$1");o.setState({data:Object(k.a)({},o.state.data,{CPF:t})})},o.hipedBallHandler=function(){"0%"===o.state.themeContent.hipedBallDirection?o.setState({data:Object(k.a)({},o.state.data,{sexo:0}),themeContent:{hipedBallDirection:"50%"}}):o.setState({data:Object(k.a)({},o.state.data,{sexo:1}),themeContent:{hipedBallDirection:"0%"}})},o}return Object(v.a)(t,e),Object(E.a)(t,[{key:"render",value:function(){var e=this.props.theme,t={backgroundColor:e.goodcolor,width:"75px",height:"25px",borderRadius:"75px",position:"relative"},o={position:"absolute",left:this.state.themeContent.hipedBallDirection,transition:"all 1s",width:parseFloat(t.width)/2+"px",backgroundColor:"rgba(0,0,0,.6)",height:t.height,borderRadius:parseFloat(t.width)/2+"px"};return n.a.createElement("div",{className:"read-main",style:{backgroundColor:e.bgcolor}},n.a.createElement("h3",{style:{color:e.color}},"ADICIONE UMA PESSOA"),n.a.createElement("form",{style:{backgroundColor:e.bggood,color:e.goodcolor},className:"create-form",onSubmit:this.handleSubmit,id:"create-form"},n.a.createElement("label",null,"Nome:",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.nome,onChange:this.handleChange,name:"nome",className:"styledInput",placeholder:"Nome"})),n.a.createElement("br",null),n.a.createElement("label",null,"Endere\xe7o",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.endereco,onChange:this.handleChange,name:"endereco",className:"styledInput",placeholder:"Endre\xe7o"})),n.a.createElement("br",null),n.a.createElement("label",null,"Telefone",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.telefone,onChange:this.handleChange,name:"telefone",className:"styledInput",placeholder:"Telefone"})),n.a.createElement("br",null),n.a.createElement("label",null,"Nacionalidade",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.nacionalidade,onChange:this.handleChange,name:"nacionalidade",className:"styledInput",placeholder:"Nacionalidade"})),n.a.createElement("br",null),n.a.createElement("label",null,"CPF:",n.a.createElement("br",null),n.a.createElement("input",{type:"text",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},placeholder:"CPF",id:"CreateCPF",onChange:this.handleChangeRegex,value:this.state.data.CPF,maxLength:"14",className:"styledInput"})),n.a.createElement("br",null),n.a.createElement("label",null,"RG",n.a.createElement("br",null),n.a.createElement("input",{type:"number",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.RG,onChange:this.handleChange,name:"RG",className:"styledInput",placeholder:"RG"})),n.a.createElement("br",null),n.a.createElement("label",null,"Data de Nascimento:",n.a.createElement("br",null),n.a.createElement("input",{type:"date",style:{color:e.goodcolor,backgroundColor:"transparent",border:"none",borderBottom:"1px solid "+e.goodcolor},value:this.state.dataDeNascimento,onChange:this.handleChange,name:"dataDeNascimento",className:"styledInput"})),n.a.createElement("br",null),n.a.createElement("label",null,"Sexo"),n.a.createElement("br",null),n.a.createElement("div",{className:"content-sexo"},n.a.createElement("div",{className:"hiped",style:t,onClick:this.hipedBallHandler},n.a.createElement("div",{className:"hipedBall",style:o})),n.a.createElement("p",null,1===this.state.data.sexo||void 0===this.state.data.sexo?"Masculino":"Feminino")),n.a.createElement("button",null,"ENVIAR")))}}]),t}(n.a.Component)),B=Object(d.b)((function(e){return{theme:e.theme}}))(O);var R=function(){return n.a.createElement(c.a,null,n.a.createElement(d.a,{store:u},n.a.createElement(s.c,null,n.a.createElement(s.a,{path:"/",component:h})),n.a.createElement(s.c,null,n.a.createElement(s.a,{exact:!0,path:"/",component:A}),n.a.createElement(s.a,{path:"/create",component:B}))))},S=Boolean("localhost"===window.location.hostname||"[::1]"===window.location.hostname||window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));function j(e,t){navigator.serviceWorker.register(e).then((function(e){e.onupdatefound=function(){var o=e.installing;null!=o&&(o.onstatechange=function(){"installed"===o.state&&(navigator.serviceWorker.controller?(console.log("New content is available and will be used when all tabs for this page are closed. See https://bit.ly/CRA-PWA."),t&&t.onUpdate&&t.onUpdate(e)):(console.log("Content is cached for offline use."),t&&t.onSuccess&&t.onSuccess(e)))})}})).catch((function(e){console.error("Error during service worker registration:",e)}))}r.a.render(n.a.createElement(R,null),document.getElementById("root")),function(e){if("serviceWorker"in navigator){if(new URL("",window.location.href).origin!==window.location.origin)return;window.addEventListener("load",(function(){var t="".concat("","/service-worker.js");S?(!function(e,t){fetch(e,{headers:{"Service-Worker":"script"}}).then((function(o){var a=o.headers.get("content-type");404===o.status||null!=a&&-1===a.indexOf("javascript")?navigator.serviceWorker.ready.then((function(e){e.unregister().then((function(){window.location.reload()}))})):j(e,t)})).catch((function(){console.log("No internet connection found. App is running in offline mode.")}))}(t,e),navigator.serviceWorker.ready.then((function(){console.log("This web app is being served cache-first by a service worker. To learn more, visit https://bit.ly/CRA-PWA")}))):j(t,e)}))}}()}},[[112,1,2]]]);
//# sourceMappingURL=main.cd8a22b1.chunk.js.map