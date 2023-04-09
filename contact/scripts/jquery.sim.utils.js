(function($)
{
  $.jscPopup = function(url,options_param,hooks_param) 
  {
    var $dlg = $('<div></div>');
    var def_hooks ={ formatTxt:null,popupShown:null};
    var hooks = $.extend(def_hooks,hooks_param||{});
    var def_options={close: function(ev,ui){ $(this).remove(); } };
    var options = $.extend(def_options,options_param||{});
    $.get(url,{},
            function (responseText) 
            {
                if($.isFunction(hooks.formatTxt))
                {
                    responseText = hooks.formatTxt(responseText);
                }
                $dlg.html(responseText);
                $dlg.dialog(options);
                if($.isFunction(hooks.popupShown))
                {
                    responseText = hooks.popupShown($dlg);
                }
            });
  }
  $.parseJSONObj=function(jsontxt)
  {
    var objarr = $.parseJSON(jsontxt);
    if(null == objarr)
    {
        return null;
    }
    var obj = $.isArray(objarr) ? objarr[0]:objarr;
    return obj;
   }
  $.jscFormatToTable = function(json,tableid)
  {
    var obj ={};
    if($.type(json)=== 'string')
    {
        obj = $.parseJSONObj(json);
    }
    else
    {
        obj = json;
    }
    
    var allrows='';
    $.each(obj, function(name,val)
    {
        allrows += '<tr><td class="tdname">'+name+'</td><td class="tdvalue">'+val+'</td></tr>\n';
    });
    
    return '<table><tbody>'+allrows+'</tbody></table>';
  }
  
  $.jscIsSet = function(v)
  {
    return ($.type(v) == 'undefined') ? false: true;
    //return (typeof(v) == 'undefined')?false:true;
  }
  
  $.jscGetUrlVars = function(urlP)
  {
    var vars = {}, hash;
    var url = $.jscIsSet(urlP)?urlP:window.location.href;
    
    var hashes = url.slice(url.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars[hash[0]] = hash[1];
    }
    return vars;
  }
  $.jscComposeURL=function(url,params)
  {
    var bare_url = url.split('?')[0];
    var url_params='';
    
    var new_params = $.extend({},$.jscGetUrlVars(url),params)
    var ret_url = bare_url;
    $.each(new_params, function(k,v)
    {
        if(0 == k){return;}
        url_params += k+'='+v+'&';
    });
    
    if(url_params.length > 0)
    {
        ret_url += '?' + url_params.slice(0,-1);
    }
    return encodeURI(ret_url);
  }
  sfm_refresh_captcha = function(img_id,input_id,page_session_id)
  {
    var $img = $("img#"+img_id);
    var r = $img.data('sfm_rand');
    var newurl = $.jscComposeURL($img.attr('src'),
                        {'sfm_get_captcha':1,
                        'sfm_captcha_k':page_session_id,
                        'rand':Math.random()*10000
                        })
    $img.attr('src', newurl);
    $("input#"+input_id).val('').focus();
  };
  sfm_hyper_link_popup = function(anchor,url,p_width,p_height)
  {
    var iframeid = anchor.id+'_frame';
    var $dlg = $("<div class='sfm_popup_container'><iframe id='"+iframeid+"'  frameborder='0' src='"+url+"' width='100%' height='100%'></iframe></div>");
    $dlg.css({overflow:'hidden',margin:0});
    var pos = $(anchor).offset();
    
    var height = $(anchor).outerHeight();
            
    $dlg.dialog({draggable:true,resizable: false,position:[pos.left,pos.top+height+20],width:p_width,height:p_height});
    
    $dlg.parent().resizable(
    {
        start:function()
        {
            var $ifr = $('iframe',this);
			var $overlay = $("<div id='dlg_overlay_div'></div>")
                .css({position:'absolute',top:$ifr.position().top,left:0})
                .height($ifr.height())
                .width('100%');

			$ifr.after($overlay);
        },
        stop:function()
        {
            $('#dlg_overlay_div',this).remove();
        }
    });
    //$iframe.attr('src',url);
  }
  
  sfm_popup_form=function(url,p_width,p_height,options_param)
  {
    var $dlg = $("<div class='sfm_popup_container'><iframe frameborder='0' src='"+url+"' width='100%' height='100%'></iframe></div>");
    $dlg.css({position:'relative',overflow:'hidden',margin:0});
    
    if(options_param && options_param.limit_to_screen === true)
    {
        if($(window).width() < p_width){ p_width = $(window).width()-20;}
        
        if($(window).height() < p_height){ p_height = $(window).height()-20;}
    }
    
    var defaults = 
        {   
            draggable:true,modal:true, resizable: true,closeOnEscape: false,width:p_width,height:p_height,
            position:{my: "center",at: "center",of: window},
            resizeStart:function()
            {
                var $ifr = $('iframe',this);
                var $overlay = $("<div id='dlg_overlay_div'></div>")
                    .css({position:'absolute', top:$ifr.position().top,left:0})
                    .height($ifr.height())
                    .width('100%');
                
                $ifr.after($overlay);
            },
            resize:function()
            {
                var $ifr = $('iframe',this);
                $('#dlg_overlay_div',this).height($ifr.height());
            },
            resizeStop:function()
            {
                $('#dlg_overlay_div',this).remove();
            }
        };
        
    var options = $.extend(defaults, options_param||{});
    
    $dlg.dialog(options);
    
  }
   
  sfm_window_popup_form=function(url,p_width,p_height,options_param)
  {
       var defaults =
       {
        location:false,menubar:false,status:true,toolbar:false,scrollbars:true
       };
       var options = $.extend(defaults, options_param||{});
       
       var params='width='+p_width+',height='+p_height;
       
       params += ',location='+ (options.location?'yes':'no');
       params += ',menubar='+ (options.menubar?'yes':'no');
       params += ',status='+ (options.status?'yes':'no');
       params += ',toolbar='+ (options.toolbar?'yes':'no');
       params += ',scrollbars='+ (options.scrollbars?'yes':'no');
       
       window.open(url,'sfm_form_popup',params);
  }
  
  sfmFormObj=function(p_divid,p_url,p_height,options_param)
  {
    var defaults =
    {
        divid:p_divid, 
        url:p_url, 
        height:p_height,
        do_url_matching:true,
        pass_url_vars:false
    };
    var options = $.extend(defaults, options_param||{});
    try
    {
    if(options.do_url_matching)
    {//The URL of the iframe should match the URl of the parent page 
     //As much a s possible for some of the features to work properly
     //like session variables, scrolling to back
        var page_a = $('<a>', { href:document.location } )[0];
        var form_a = $('<a>', { href:p_url } )[0];
    
    //https/http
        if(page_a.protocol == 'https:')
        {
            form_a.protocol = page_a.protocol;
        }
        
        if(page_a.hostname.length > 0)
        {
            if(form_a.hostname == page_a.hostname || 
               form_a.hostname == ('www.'+page_a.hostname)||
               ('www.'+form_a.hostname) == page_a.hostname)
            {
                form_a.hostname = page_a.hostname;
            }
        }
        //Pass url variables to form url. This can be used to init the form
        if(true == options.pass_url_vars)
        {
            var parent_q = page_a.search.substr(1);
            if(parent_q.length > 0)
            {
                var q1 = form_a.search.length==0 ?'?':'&';
                form_a.search += q1 + parent_q;
            }
        }
        options.url = form_a.href;
     }
    }catch(e)
    {
    
    }

    $(function()
    {
        $ifr = $("<iframe frameborder='0' src='"+options.url+"' width='100%' height='"+options.height+"' allowtransparency='true'></iframe>");
        $('#'+options.divid).append($ifr);
    });
  }
  
  sfm_add_value_to_sliders=function()
  {
      $('.sfm_slider').on('input change', function(){
          $(this).next($('.slider_label')).html(this.value);
        });
      $('.slider_label').each(function(){
          var value = $(this).prev().attr('value');
          $(this).html(value);
        });
  }

  sfm_show_loading_on_formsubmit=function(formname,id)
  {
    var $form = $('form#'+formname);
    
    $('#'+id,$form).click(function()
    { 
        if(this.form.disable_onsubmit)
        {//for prev button, no validation_success is called. since there is no validation
            $(this).parent().addClass('loading_div');
            $(this).hide();
        }
        else
        {
            $(this.form).data('last_clicked_button',this.id); 
        }
        return true;
    });
    
    $form.bind('validation_success',function()
    {
        if($(this).data('last_clicked_button') === id)
        {
            $('#'+id,this).parent().addClass('loading_div');
            $('#'+id,this).remove();
        }
    });
    $('#'+id,$form).parent().removeClass('loading_div');
  }
  
  sfm_clear_form = function(formobj) 
  {
    var $formobj = $(formobj);
    if($formobj.get(0).validator)
    { 
        $formobj.get(0).validator.clearMessages(); 
    }
    
    $formobj.find(':input').each(function() 
    {
        switch(this.type) 
        {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'textarea':
            case 'email':
            case 'tel':
            {
                $(this).val('');
                $(this).trigger('change');
                break;
            }
            case 'range':
            {
                $(this).val($(this).attr('min'));
                $(this).trigger('change');
                break;
            }
            case 'text':
            {
                if(this.sfm_num_obj)
                {
                    $(this).val('0');
                }
                else
                {
                    $(this).val('');
                }
                $(this).trigger('change');
                break;
            }
            case 'checkbox':
            case 'radio':
            {
                this.checked = false;
                $(this).trigger('change');
                break;
            }
        }
    });
    
  }
  
  
  sfm_init_special_action_button = function(formname,id,name)
  {
       var $form = $('form#'+formname);
       var $button = $('#'+id,$form);
       $button.attr('name',id);
       $button.data('sfm_special_var_name',name)
       $button.click(function()
       {
          var form = $(this).closest('form').get(0);
          $("<input type='hidden' name='"+$(this).data('sfm_special_var_name')+"' value='yes' />").appendTo(form);
          form.submit();
          return false;
       });
  };
  
   sfm_init_default_text = function(formname,id,def_txt)
   {
       var $form = $('form#'+formname);
       var $txt = $('#'+id,$form);
       if($txt.length <=0){ return; }
       
       var txtobj = $txt.get(0);
       
       txtobj.default_text = def_txt;
       function init()
       {
            var $div = $('<div></div>').text(txtobj.default_text);
            var divobj = $div.get(0);
            var divcssobj = {};
            var requiredProps =["cursor","height","width","letter-spacing","word-break","word-wrap","fontFamily","fontSize","fontSizeAdjust","fontStretch","fontStyle","fontVariant","fontWeight","letterSpacing","lineHeight","marginBottom","marginLeft","marginRight","marginTop","paddingBottom","paddingLeft","paddingRight","paddingTop","z-index"];
            
            for (var i = 0; i < requiredProps.length; i++) 
            {
                divcssobj[requiredProps[i]] = $txt.css(requiredProps[i]);
            }            
            jQuery.extend( divcssobj, {
                position : 'absolute',
                left : $txt.position().left,
                top : $txt.position().top,
                border:0,
                'background-color':'transparent',
                'background-image':'none',
                overflow:'hidden',
                "overflow-x":'hidden',
                "overflow-y":'hidden',
                color:'#999'
            });

            $div.css(divcssobj);
            if($txt.prop("tagName") == 'TEXTAREA')
            {
                $txt.css({ overflow:'auto'});
            }
            
            $div.addClass('sfm_auto_hide_text');
            $txt.parent().append($div);
            txtobj.overlay_obj = divobj;
            //$txt.val('');
            divobj.inputbelow = txtobj;
            divobj.hideself=function()
            {
                var inp = this.inputbelow;
                $(this).hide();
                $(inp).focus();
            };
            divobj.showself=function()
            {
                $(this).show();
                $(this.inputbelow).val('');
            };
            $div.bind('mouseup',function(event)
            {
                this.hideself();
                event.stopPropagation();
            });
            
            if($txt.val() =='' || $txt.val() == txtobj.default_text)
            {
                $txt.val('');
            }
            else
            {
                txtobj.make_empty();
            }
       }
       txtobj.make_empty=function()
       {
            if($(this.overlay_obj).is(":visible"))
            {
                this.overlay_obj.hideself();
            }
       }; 
       txtobj.restore_default=function()
       {
           if(this.default_text && ($(this).val() == ''||
                    $(this).val() == this.default_text))
           {
                this.overlay_obj.showself();
           }
       };
       
       $txt.focus(function() 
       {
            this.make_empty();
       });
       
       $txt.blur(function()
       {
            this.restore_default();
       });   
       init();
   }

  //Initializations Here
  $(function()
  {
    sfm_add_value_to_sliders();
  });

})(jQuery);
