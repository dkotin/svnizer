            function loadHTML(sURL){
                var tmp='';
                function jCallBack(data){
                    tmp=data;
                }             
                tmp=''; 
                jQuery.ajax( {'success':jCallBack,'type':'GET','url':sURL,'async':false});
                return tmp;
            }


            function loadHTMLPOST(sURL,data){
            var tmp='';
                function jCallBack(data){
                    tmp=data;
                }             
                tmp=''; 
                jQuery.ajax( {'success':jCallBack,'data':data,'type':'POST','url':sURL,'async':false});
                return tmp;
            }

            function ajaxLoad(what){
                jQuery('#content').html("Loading...");
                var tmp=loadHTML('#'+what);
                jQuery('#content').html(tmp);
                
            }

            function ajaxFormSubmit(jForm){
                var url=jQuery(jForm).attr('action');
  
                var data=jQuery(jForm).serialize();
                var result=loadHTMLPOST(url,data);
                jQuery('#content').html(result);
            }



 