var ageent_all=new Array();
var ageent_go=new Array();
function getmeselectag(){
    CustomNiceWtranslate.init();  
}
(function(agjoker) { 
var OPT_ID = 0;
var OPT_TITLE = 1;
var OPT_VOTES = 2;
var ageent_height = new Array();
var count=new Array();
var onlyoneclick=new Array();
var ageent_content=new Array();
agjoker(function() {
     getmeselectag(); 
     for (i = 0; i < ageent_all.length; i++) {
            ageent_height[i]="";
            count[i]=0;
            onlyoneclick[i]=0;
            ageent_content[i]=new String();
            ageent_go[i]=ageent_all[i]; 
            ageent_do(i);
    }
    
    function ageent_do(ag_index) {
        var getelement= new Array();

        
        ageent_go[ag_index]["sufics_varibal"]="."+ageent_go[ag_index]["sufics_varibal"];

        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollresult").removeAttr("onclick");
        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll").attr("action",ageent_go[ag_index]["just_site_url"]);
        
        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollresult").removeAttr("onclick");
        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollsend").live("click",function() {
            checked = agjoker(ageent_go[ag_index]["sufics_varibal"]+" input:checked'").val();
                agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollresult").attr("disabled", false);
                    get_cookei = getCookie(cookei);
                if(get_cookei) {
                                    if(ageent_go[ag_index]["already_voted"]==1) {
                                        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .youalredyvote").css({"display":"table-row"});
                                        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .already_voted").css({"display":"block"});  
                                    }
                                    ageent_width = agjoker(ageent_go[ag_index]["sufics_varibal"]).width();
                                    agjoker(ageent_go[ag_index]["sufics_varibal"]+" .already_voted").css({"width":ageent_width+"px"});
                } else if(checked!= undefined) {
                    if(ageent_go[ag_index]["already_voted"]==1) {
                        ageent_width = agjoker(ageent_go[ag_index]["sufics_varibal"]).width();
                        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .already_voted").css({"width":ageent_width+"px"});
                    }
                    agjoker(ageent_go[ag_index]["sufics_varibal"]+" .already_error").css({"display":"none"});
                    agjoker(ageent_go[ag_index]["sufics_varibal"]+" .youalredyvote").css({"display":"none"});
                    ageent_content[ag_index] = agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").html();
                    onlyoneclick[ag_index]=1;
                    real_send(ag_index);
                } else {
                    ageent_width = agjoker(ageent_go[ag_index]["sufics_varibal"]).width();
                    agjoker(ageent_go[ag_index]["sufics_varibal"]+" .already_error").css({"width":ageent_width+"px"});
                    agjoker(ageent_go[ag_index]["sufics_varibal"]+" .youalredyvote").css({"display":"table-row"});
                    agjoker(ageent_go[ag_index]["sufics_varibal"]+" .already_error").css({"display":"block"});
                    return false;
                }
        });
        
        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollresult").live("click",function() {
            agjoker(ageent_go[ag_index]["sufics_varibal"]+" input[type=radio]").removeAttr('checked');
            real_send(ag_index);
        });
       

        fix_height=agjoker(ageent_go[ag_index]["sufics_varibal"]).height();
        agjoker(ageent_go[ag_index]["sufics_varibal"]).css({"min-height":fix_height+"px"});
        ageent_content[ag_index] = agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").html();
        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .back_please").live("click",function() {
            agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").html(ageent_content[ag_index]);
            time_height=agjoker(ageent_go[ag_index]["sufics_varibal"]).height();
            agjoker(ageent_go[ag_index]["sufics_varibal"]).css({height: time_height+"px"}).animate({ height: ageent_height[ag_index]}, 'slow');
        });
         
        real_one(ag_index);
        get_cookei = getCookie(cookei);
        if(get_cookei) {
            if(ageent_go[ag_index]["already_voted"]==1) {
             agjoker(ageent_go[ag_index]["sufics_varibal"]+" .youalredyvote").removeAttr("style");   
             ageent_width = agjoker(ageent_go[ag_index]["sufics_varibal"]).width();
             agjoker(ageent_go[ag_index]["sufics_varibal"]+" .already_voted").css({"width":ageent_width+"px"});
            }
            if(ageent_go[ag_index]["ag_fast_refrash"]!=0) {
                agjoker(ageent_go[ag_index]["sufics_varibal"]+" input[type=radio]").attr("disabled", true); 
                if(ageent_go[ag_index]["ag_disabled_or_del"]) {
                  //agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollsend").attr("disabled", true);   
                } else {
                  agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollsend").remove();   
                } 
                ageent_content[ag_index] = agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").html();
                var id_poll =  agjoker(ageent_go[ag_index]["sufics_varibal"]+" input[name=number_poll]").attr("value");
                var id_option = agjoker(ageent_go[ag_index]["sufics_varibal"]+" input[name=voteid]:checked").attr("value");
                adress = agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll").attr("action");
                agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").empty();
                ageent_height[ag_index] = agjoker(ageent_go[ag_index]["sufics_varibal"]).height();
                agjoker.getJSON(adress+"?number_poll="+id_poll+"&id_option="+id_option,  function(data_ageent){
                    loadResults( data_ageent,ag_index); 
                });
            } else {
                agjoker(ageent_go[ag_index]["sufics_varibal"]+" input[type=radio]").attr("disabled", true); 
                if(ageent_go[ag_index]["ag_disabled_or_del"]) {
                  //agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollsend").attr("disabled", true);   
                } else {
                  agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollsend").remove();   
                } 
                ageent_content[ag_index] = agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").html();
            }
        } else {
            if(ageent_go[ag_index]["show_resultat"]==0) agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollresult").attr("disabled", true);
        }   
    }
  });
  
function real_send(ag_index) {
        formProcess(ag_index) // setup the submit handler
 }
 
function real_one(ag_index) {
    cookei = agjoker("input[name=cookieName]").attr("value");
 }
  
function formProcess(ag_index){
  ageent_height[ag_index] = agjoker(ageent_go[ag_index]["sufics_varibal"]).height();
  agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").parent().next().remove();  
  
  if(onlyoneclick[ag_index]){
    agjoker(ageent_go[ag_index]["sufics_varibal"]+" input[type=radio]").attr("disabled", true); 
    if(ageent_go[ag_index]["ag_disabled_or_del"]) {
        //agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollsend").attr("disabled", true);   
    } else {
        agjoker(ageent_go[ag_index]["sufics_varibal"]+" .nicepollsend").remove();   
    } 
    ageent_content[ag_index] = agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").html();
  }
  var id_poll =  agjoker(ageent_go[ag_index]["sufics_varibal"]+" input[name=number_poll]").attr("value");
  var id_option = agjoker(ageent_go[ag_index]["sufics_varibal"]+" input[name=voteid]:checked").attr("value");
            
  agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").fadeOut("slow",function(){
    adress = agjoker(ageent_go[ag_index]["sufics_varibal"]+"  .poll").attr("action");
    agjoker(this).empty();
    agjoker.getJSON(adress+"?number_poll="+id_poll+"&id_option="+id_option, function(data_ageent){
        loadResults( data_ageent,ag_index); 
    });
  });
}

function randomNumber(m,n){
  m = parseInt(m);
  n = parseInt(n);
  return Math.floor( Math.random() * (n - m + 1) ) + m;
}

function animateResults(ag_index){
  agjoker(ageent_go[ag_index]["sufics_varibal"]+" .i_find_you").each(function(){
      var percentage = agjoker(this).attr("title");
      agjoker(this).css({width: "0%"}).animate({ width: percentage}, 'slow');
  });
}

function loadResults(data_ageent,ag_index) {
  var total_votes = 0;
  var percent="";  
  count[ag_index]=0;
  var colors = new Array("#ed1c24","#39b54a","#0000ff","#cc9900","#c7b299","#0076a3","#005e20","#000","#ed1c24","#39b54a","#0000ff","#fff200","#c7b299","#0076a3","#005e20","#cc3399","#005552","7b7d7b#","#2ec8db","#99ff00","#ffff66","#993366","#5a1657"); 
  
  for (id in data_ageent) {
    if(data_ageent[id][OPT_VOTES]>=0) {  
        total_votes = total_votes+parseInt(data_ageent[id][OPT_VOTES]);
    }
  }

  var results_html = "<div class='poll-results'>\n<table>\n";
  for (id in data_ageent) {
    if(data_ageent[id][OPT_VOTES]>=0) {  
    results_html = results_html + "<tr>";
    percent = Math.round(((parseInt(data_ageent[id][OPT_VOTES])/parseInt(total_votes))*ageent_go[ag_index]["nicepoll_width_percent"]));
    real_percent = Math.round((parseInt(data_ageent[id][OPT_VOTES])/parseInt(total_votes))*100);
    vievpercent = real_percent;
    if(percent == 0) {
      percent = 1;
      vievpercent=0;   
    }
    if(ageent_go[ag_index]["nicepoll_template_list"]==1) {
        results_html = results_html+"<td colspan=\"2\" class=\"temp_two\">"+data_ageent[id][OPT_TITLE]+" ("+data_ageent[id][OPT_VOTES]+")</td></tr><tr><td align='left' width='"+ageent_go[ag_index]["nicepoll_width_percent"]+"'><div class='goad_lol'><div style='width:0%; background-color:"+colors[count[ag_index]]+";' class='i_find_you' title='"+percent+"'>&nbsp;</div></div></td><td align='right'><strong>"+vievpercent+"%</strong></td>\n";
    } else {
        results_html = results_html+"<td class='one_point'>"+data_ageent[id][OPT_TITLE]+"</td><td align='left' width='"+ageent_go[ag_index]["nicepoll_width_percent"]+"'><div class='goad_lol'><div style='width:0%; background-color:"+colors[count[ag_index]]+";' class='i_find_you' title='"+percent+"'>&nbsp;</div></div></td><td align='right'><strong>"+vievpercent+"%</strong></td>\n";
    }
    results_html = results_html + "</tr>";
    count[ag_index] = count[ag_index] + 1;
    }
  }
  
  if(ageent_go[ag_index]["ag_real_back"]) {
    yourealback=" <a href='' class='back_please' onclick='return false'>"+ageent_go[ag_index]["ag_back"]+" ^</a>";  
  } else {
    yourealback="";  
  }

  if(ageent_go[ag_index]["mod_nicepoll"]) {
     if(ageent_go[ag_index]["ag_total_votes"].length!=0) { 
    results_html = results_html+"</table><p class='total'>"+ageent_go[ag_index]["ag_total_votes"]+": <b>"+total_votes+"</b>"+yourealback+"<br /><a href='"+ageent_go[ag_index]["full_url_nicepoll"]+"' title='"+ageent_go[ag_index]["ag_all_poll"]+"' class='polls'>"+ageent_go[ag_index]["ag_all_poll"]+"</a></p></div>\n";
     } else {
    results_html = results_html+"</table><p class='total'><a href='"+ageent_go[ag_index]["full_url_nicepollfull_url_nicepoll"]+"' title='"+ageent_go[ag_index]["ag_all_poll"]+"' class='polls'>"+ageent_go[ag_index]["ag_all_poll"]+"</a>"+yourealback+"</p></div>\n";
     }
  } else {
     if(ageent_go[ag_index]["ag_total_votes"].length!=0) { 
         results_html = results_html+"</table><p class='total'>"+ageent_go[ag_index]["ag_total_votes"]+": <b>"+total_votes+"</b>"+yourealback+"</p></div>\n";
     } else {
         results_html = results_html+"</table></div>\n";
     }
  }
  
  agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").append(results_html).fadeIn("slow", function(){ animateResults(ag_index);});
  real_height_one = agjoker(ageent_go[ag_index]["sufics_varibal"]+" .one_quesion").height();
  real_height_two = agjoker(ageent_go[ag_index]["sufics_varibal"]+" .poll-container").height();
  real_height = real_height_one + real_height_two;
  agjoker(ageent_go[ag_index]["sufics_varibal"]).css({"height":ageent_height[ag_index]+"px","min-height":"0px"});
  agjoker(ageent_go[ag_index]["sufics_varibal"]).css({"min-height":"0px"});
  agjoker(ageent_go[ag_index]["sufics_varibal"]).css({height: ageent_height[ag_index]+"px"}).animate({ height: real_height}, 'slow');
}

function getCookie(name) {
        var prefix = name + "="
        var cookieStartIndex = document.cookie.indexOf(prefix)
        if (cookieStartIndex == -1)
                return null
        var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length)
        if (cookieEndIndex == -1)
                cookieEndIndex = document.cookie.length
        return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex))
}
})(Ageent);