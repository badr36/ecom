if(!_.theme_graph){_.theme_graph=1;(function($){$.ra($.fa.anychart.themes.defaultTheme,{graph:{labels:{enabled:!1,fontSize:8,fontColor:"#7c868e",disablePointerEvents:!0,selectable:!1,anchor:"center-top",position:"center-bottom",padding:{top:0,left:0,right:0,bottom:0}},padding:10,tooltip:{displayMode:"single",positionMode:"float",separator:{enabled:!1},title:{enabled:!1},titleFormat:""},nodes:{width:12,height:12,shape:"circle",tooltip:{format:"{%id}"},labels:{format:"{%id}",enabled:!1},normal:{fill:$.EN,stroke:$.JN},hovered:{fill:$.KN,stroke:$.EN},
selected:{fill:"#333 0.85",stroke:"1.5 #212121"}},edges:{arrows:{enabled:!1,size:10,position:"100%"},stroke:$.KN,hovered:{stroke:$.JN},selected:{stroke:"#333 0.85"},labels:{enabled:!1,format:"from {%from} to {%to}"},tooltip:{format:"from: {%from}\nto: {%to}"}},layout:{type:"forced",iterationCount:500},interactivity:{enabled:!0,zoomOnMouseWheel:!0,scrollOnMouseWheel:!1,nodes:!0,edges:!0,magnetize:!1,hoverGap:7}}});}).call(this,$)}
