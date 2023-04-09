function Validator(frmname,settings_param)
{
   var $ = jQuery;

   var formobj= null;
   
   var validations= new Array();
   
   this.defaults =
       {
         show_all_messages_together:false,
         enable_smart_live_validation:true,
         custom_validation_fn:false,
         message_style:'smart_message', //smart_message, messagebox or singlebox
         error_popup:
            {
                style:{},
                message_pos:'right'//right or top
            }
       };
       
   this.settings = {};
   var focusvalidations = {};
   var elementdata={};
   var lastfocus_element=false;
   this.pending_validations =
    {
        trigger_type:false,
        collection: $(),
        on_starting_one:function(element_name)
        {
            this.collection.add(utils.getElementObject(element_name));
        },
        on_completing_one:function(element_name)
        {
            var $elm = utils.getElementObject(element_name);
            this.collection = this.collection.not($elm);
            
            if(this.collection.size() == 0)
            {
                if(this.trigger_type === 'submit')
                {
                    this.trigger_type=false;
                    $(formobj).submit();
                }
                else
                {
                    formobj.validator.validate($elm);
                }
            }
        }
    };
   var methods = 
       {
            required://1
            {
                fn:function(formobj,element_obj,match_value)
                    {
                        return utils.isempty(element_obj)?false:true;
                    },
                default_msg:"This field {name} is required",
                trigger:'submit',
				test_even_if_empty:true
            },
            email://2
            {
                fn:function(formobj,element_obj,match_value)
                {
                    var value = $(element_obj).val();
                    //from:http://projects.scottsplayground.com/email_address_validation/
                    var ret = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(value);
                    return ret;
                },
                default_msg:"Please provide a valid email address",
                trigger:'blur'
            },
            maxlen://3
            {
                fn:function(formobj,element_obj,maxlength)
                {
                    return $(element_obj).val().length > parseInt(maxlength)?false:true;
                },
                default_msg:"Maximum length of input for {name} is {mvalue}",
                trigger:'live'
            },
            minlen://4
            {
                fn:function(formobj,element_obj,minlength)
                {
                    return $(element_obj).val().length < parseInt(minlength)?false:true;
                },
                default_msg:"Minimum length of input for {name} is {mvalue}",
                trigger:'blur',
				test_even_if_empty:true
            },
            alnum://5
            {
                fn:function(formobj,element_obj,minlength)
                {
                    var value = $(element_obj).val();
                    return /^[A-Za-z0-9]+$/i.test(value);
                },
                default_msg:"Only Alpha-numeric values allowed for {name}",
                trigger:'live'
            },
            alnum_s://6
            {
                fn:function(formobj,element_obj,minlength)
                {
                    var value = $(element_obj).val();
                    return /^[A-Za-z0-9\s]+$/i.test(value);
                },
                default_msg:"Only Alpha-numeric values allowed for {name}",
                trigger:'live'
            },
            alpha://7
            {
                fn:function(formobj,element_obj,minlength)
                {
                    var value = $(element_obj).val();
                    return /^[A-Za-z]+$/i.test(value);
                },
                default_msg:"Only English alphabetic values allowed for {name}",
                trigger:'live'
            },
            alpha_s://8
            {
                fn:function(formobj,element_obj,minlength)
                {
                    var value = $(element_obj).val();
                    return /^[A-Za-z\s]+$/i.test(value);
                },
                default_msg:"Only English alphabetic values allowed for {name}",
                trigger:'live'
            },
            numeric://9
            {
                fn:function(formobj,element_obj,minlength)
                {
                    var value = utils.getNumber($(element_obj).val());
                    return isNaN(value)?false:true;
                },
                default_msg:"Only numeric values allowed for {name}",
                trigger:'live'            
            },
			lessthan://10
			{
				fn:function(formobj,element_obj,cmp_value)
                {
                    var value = utils.getNumber($(element_obj).val());
                    //Note: the number literals are in standard number format. Only user input is localized format
                    //So using plain parseFloat()                    
					var cmp_val = parseFloat(cmp_value);
					if(isNaN(value) || isNaN(cmp_val))
					{
						utils.logWarning(element_obj.name+": received non number value for less than comparison");
						return false;
					}
                    return (value < cmp_val);
                },
                default_msg:"{name} should be less than {mvalue}",
                trigger:'blur'
			},
			greaterthan://11
			{
				fn:function(formobj,element_obj,cmp_value)
                {
                    var value = utils.getNumber($(element_obj).val());
                    //Note: the number literals are in standard number format. Only user input is localized format
                    //So using plain parseFloat()
					var cmp_val = parseFloat(cmp_value);
					if(isNaN(value) || isNaN(cmp_val))
					{
						utils.logWarning(element_obj.name+": received non number value for greater than comparison");
						return false;
					}
                    return (value > cmp_val);
                },
                default_msg:"{name} should be greater than {mvalue}",
                trigger:'blur'			
			},
			regexp://12
			{
				fn:function(formobj,element_obj,reg_exp)
                {
					var value = $(element_obj).val();
					var regexp = new RegExp(reg_exp);
					return regexp.test(value);
				},
                default_msg:"Please provide a valid value for {name}",
                trigger:'blur'				
			},
			dontselect://move to required?//13
			{
				fn:function(formobj,element_obj,dontsel_value)
                {
					var value = $(element_obj).val();
					return dontsel_value != value;
				},
                default_msg:"Please select an option for {name}",
                trigger:'submit',
				test_even_if_empty:true
			},
			dontselectchk://14
			{
				fn:function(formobj,element_obj,dontsel_value)
                {
					return utils.isCheckSelected(element_obj,dontsel_value)?false:true;
				},
                default_msg:"Can not proceed as you selected {name} {mvalue}",
                trigger:'live',
				test_even_if_empty:true				
			},
            shouldselchk://15
            {
				fn:function(formobj,element_obj,dontsel_value)
                {
					return utils.isCheckSelected(element_obj,dontsel_value)?true:false;
				},
                default_msg:"Please select {name}",
                trigger:'submit',
				test_even_if_empty:true
            },
            selmin://16
            {
                fn:function(formobj,element_obj,min_checks)
                {
                    return (utils.getNumChecked(formobj,element_obj) 
                                < parseInt(min_checks))?false:true;
				},
                default_msg:"Please select atleast {mvalue} options for {name}",
                trigger:'submit',
				test_even_if_empty:true
            },
            selmax://17
            {
                fn:function(formobj,element_obj,max_checks)
                {
                    return (utils.getNumChecked(formobj,element_obj) 
                                > parseInt(max_checks))?false:true;
				},
                default_msg:"You can select maximum of {mvalue} options for {name}",
                trigger:'live',
				test_even_if_empty:true            
            },
            selone://move to required?//18
            {
                fn:function(formobj,element_obj,max_checks)
                {
                    return (utils.getNumChecked(formobj,element_obj) 
                                <= 0)?false:true;
				},
                default_msg:"Please select an option for {name}",
                trigger:'submit',
				test_even_if_empty:true                 
            },
            dontselectradio://same as dontselectchk //19
            {
                fn:function(formobj,element_obj,dontsel_value)
                {
					return utils.isCheckSelected(element_obj,dontsel_value)?false:true;
				},
                default_msg:"Can not proceed as you selected {name} {mvalue}",
                trigger:'live',
				test_even_if_empty:true	            
            },
            selectradio://same as shouldselchk //20
            {
				fn:function(formobj,element_obj,sel_value)
                {
					return utils.isCheckSelected(element_obj,sel_value)?true:false;
				},
                default_msg:"Please select {name} {mvalue}",
                trigger:'submit',
				test_even_if_empty:true            
            },
            eqelmnt://21
            {
                fn:function(formobj,element_obj,other_element)
                {
					return $(element_obj).val() == utils.getElementValue(other_element)?true:false;
				},
                default_msg:"{name} should be same as {mvalue}",
                trigger:'submit',
                test_even_if_empty:true
            },
            neelmnt://22
            {
                fn:function(formobj,element_obj,other_element)
                {
					return $(element_obj).val() != utils.getElementValue(other_element)?true:false;
				},
                default_msg:"{name} should not be same as {mvalue}",
                trigger:'submit'
            },
            ltelmnt://23
            {
                fn:function(formobj,element_obj,other_element)
                {
                    var comp = utils.getCompareValues(element_obj,other_element);
                    if(!comp){return true;}//If the parameters are not proper numbers, then we don't perform this validation.
                    return  comp.param < comp.other ?true:false;
				},
                default_msg:"{name} should be less than {mvalue}",
                trigger:'submit'
            },
            leelmnt://24
            {
                fn:function(formobj,element_obj,other_element)
                {
                    var comp = utils.getCompareValues(element_obj,other_element);
                    if(!comp){return true;}
                    return comp.param <= comp.other ?true:false;
				},
                default_msg:"{name} should be less than or equal to {mvalue}",
                trigger:'submit'            
            },
            gtelmnt://25
            {
                fn:function(formobj,element_obj,other_element)
                {
                    var comp = utils.getCompareValues(element_obj,other_element);
                    if(!comp){return true;}
                    return comp.param > comp.other ?true:false;
				},
                default_msg:"{name} should be greater than {mvalue}",
                trigger:'submit'            
            },
            geelmnt://26
            {
                fn:function(formobj,element_obj,other_element)
                {
                    var comp = utils.getCompareValues(element_obj,other_element);
                    if(!comp){return true;}
                    return comp.param >= comp.other ?true:false;                
				},
                default_msg:"{name} should be greater than or equal to {mvalue}",
                trigger:'submit'            
            },
            req_file://27
            {
                fn:function(formobj,element_obj,match_value)
                    {
                        return (element_obj.value.length <= 0) ?false:true;
                    },
                default_msg:"This field {name} is required",
                trigger:'submit',
				test_even_if_empty:true
            },
            file_extn://28
            {
                fn:function(formobj,element_obj,match_value)
                    {
                        //The 'required' validation is not done here
                        if(element_obj.value.length <= 0){ return true; }
                        found = sfm_is_valid_extension(element_obj.value,match_value);
                        return found;
                    },
                default_msg:"{name}: allowed file extensions are {mvalue}",
                trigger:'live'
            },
            remote:
            {
                fn:function(formobj,element_obj,url)
                    {
                        if(this.pending_reply){ return false; }
                        if(this.validated_value && this.validated_value === $(element_obj).val())
                        {
                            if('msg_failed' != this.remote_error_msg)
                            {
                                this.message = this.remote_error_msg;
                            }
                            return this.remote_result;
                        }
                        var validationobj = this;
                        validationobj.validated_value = $(element_obj).val();
                        var validator = formobj.validator;
                        var element_name = element_obj.name;
                        url = $.trim(url);
                        var fchar = url.substring(0,1);
                        if( fchar == '?' )
                        {
                            if($.jscComposeURL)
                            {
                                url = $.jscComposeURL(formobj.action,$.jscGetUrlVars(url));
                            }
                            else
                            {
                                url = formobj.action.split('?')[0] + url;
                            }
                        }
                        this.pending_reply=true;
                        validator.pending_validations.on_starting_one(element_name);
                        $.get(url,$(element_obj).serialize(),
                            function(retval)
                            {
                               if(retval == 'success')
                               {
                                 validationobj.remote_result = true;
                               }
                               else
                               {
                                 validationobj.remote_result = false;
                                 validationobj.remote_error_msg = retval;
                               }
                               validationobj.pending_reply=false;
                               validator.pending_validations.on_completing_one(element_name);
                            });
                        return false;
                        //The 'required' validation is not done here
                     /*   if(element_obj.value.length <= 0){ return true; }
                        found = sfm_is_valid_extension(element_obj.value,match_value);
                        return found;*/
                    },
                default_msg:"",
                trigger:'submit',
                no_live_trigger:true
            }
       };
   
   this.init = function (frmname)
       {
            formobj = document.forms[frmname];

            if(!formobj)
            {
                (typeof(console) === 'object') && console.warn("Error: couldnot get Form object "+frmname);
                return false;;
            }
            formobj.validator = this;
            
            $(formobj).submit(function()
            { 
                if(this.disable_onsubmit){return true;}
                var ret = this.validator.onsubmit();
                if(ret)
                {
                    $(this).trigger('validation_success');
                }
                else
                {
                    $(this).trigger('validation_error');
                }
                return ret;
            });
            formobj.DisableValidations = function()
            {
                this.disable_onsubmit=true;
            }
            
            this.settings = $.extend(/*deep*/true,this.defaults,settings_param||{});
            
            $(':input',formobj).focus(function(){this.form.validator.onfocus_anyelement(this)});
            switch(this.settings.message_style)
            {
                case 'smart_message':
                    this.EnableOnPageErrorDisplay();
                    break;
                case 'messagebox':
                    this.EnableMessageBoxErrorDisplay();
                    break;
                case 'singlebox':
                    this.EnableOnPageErrorDisplaySingleBox();
                    break;                    
            }
            
       }
  var utils=
    {
        isempty:function(element_obj)
        {
            var value =(typeof(element_obj)=='string')?element_obj:$(element_obj).val();
            value = $.trim(value);
            return value.length<=0?true:false;
        },
        getElementObject:function(element_name)
        {
            var $e = $("[name='"+element_name+"']",formobj);
            return ($e.length > 0) ? $e[0]:false;
        },
        getElementjQueryObject:function(element_name)
        {
            return $("[name='"+element_name+"']",formobj);
        },
        logWarning:function(msg)
        {
            (typeof(console) === 'object') && console.warn(msg);
        },
        log:function(msg)
        {
            (typeof(console) === 'object') && console.log(msg);
        },
		getNumber:function(param)
		{
			if(typeof(param)=='number'){ return param; }
            var str = param;
            if(typeof(param) == 'object'){ str = $(param).val(); }
            
            if(typeof(Globalize) === 'undefined')
            {
                str = str.replace(/\,/g,"");
                return parseFloat(str);
            }
            else
            {
                return Globalize.parseFloat(str);
            }
		},
        getNumberFromElement:function(element_name)
		{
            return this.getNumber(this.getElementObject(element_name));
        },
        getElementValue:function(element_name)
        {
            var $elemnt = this.getElementjQueryObject(element_name);
            var ret_val=false;
            if($elemnt.length > 0)
            {
                ret_val = $elemnt.val();
            }
            else
            {
                if(typeof(sfm_IsFormSaved)== typeof(Function) && sfm_IsFormSaved(formobj.id))
                {
                    if(typeof(sessvars.simform[formobj.id].vars[element_name]) != 'undefined')
                    {
                        ret_val = sessvars.simform[formobj.id].vars[element_name];
                    }
                }
            }
            return ret_val;
        },
        getCompareValues:function(element_obj,other_element_name)
        {
            var other_element = this.getElementValue(other_element_name);
            if(false === other_element){ return false; }
            if(this.isempty(element_obj) || this.isempty(other_element))
            {
                return false;
            }
            var param_value = this.getNumber(element_obj);
            var other_value = this.getNumber(other_element);
            
            if(isNaN(param_value)||isNaN(other_value)){return false;}
            return {param:param_value,other:other_value};
        },
		isCheckSelected:function(element_obj,chkValue)
		{
            var $chkboxes = $("[name='"+element_obj.name+"']",formobj);
            if($chkboxes.length <= 1)
            {
                return $chkboxes.is(':checked');
            }
            else
            {
                var selected=
                    $chkboxes.filter("[value='"+chkValue+"']:checked").length > 0?true:false;
                return selected;
            }
		},
        getNumChecked:function(formobj,element_obj)
        {
            return $("[name='"+element_obj.name+"']:checked",formobj).length;
        }
    };
   this.onfocus_anyelement=function(element_obj)
   {
       if(lastfocus_element && focusvalidations[lastfocus_element.name] &&
         lastfocus_element != element_obj)
       {
            this.livevalidate(lastfocus_element,'blur');
       }
       lastfocus_element = element_obj;
   };
   this.onsubmit=function()
       {
           this.pending_validations.trigger_type ='submit';
           var ret = this.validate();
           return ret;
       };
   
   this.addValidation= function(element_name,descriptor_obj)
       {
			var ret=false;
            //element_name 
            //condition
            //message
            var valobj = {'element_name':element_name};
			var method;
            var umethod;
            $.each(descriptor_obj,function(k,v)
                    {
                        valobj[k]=v;
                        if(methods[k])
                        {
                            valobj['match_value']  = v;
                            valobj['descriptor']   = k;
							method = methods[k];
                        }
                        if(k != 'element_name'&& k!='condition' && k!='message' && !umethod)
                        {
                            umethod = k;
                        }
                    });
			if(method)
			{
                if(!valobj['message'])
                {
                    valobj['message'] = method.default_msg;
                }
                valobj = $.extend(valobj,method);
            }
            else
            if(umethod)
            {//should be a custom method handled by custom widgets
                valobj['descriptor']   = umethod;
                valobj['match_value']  = descriptor_obj[umethod];
            }
            
            if(!elementdata[element_name])
            {
                elementdata[element_name]={};
            }
            
            if(this.settings.enable_smart_live_validation)
            {
                this.attach_element_events(element_name,valobj);
            }
            validations.push(valobj);
			return true;
       };
       
       var element_live_event_handler = function(trigger)
       {
            if(!this.form || !this.form.validator)
            {
                utils.logWarning("Validation event on unintialized element "+this.name);
                return;
            }
            this.form.validator.livevalidate(this,'live');
       }
       
       var element_correction_event_handler = function()
       {
            if(!this.form || !this.form.validator)
            {
                utils.logWarning("Validation event on unintialized element "+this.name);
                return;
            }
            this.form.validator.livevalidate(this,'correction');
       }       
       
       this.attach_element_events = function(element_name,valobj)
       {
            var $element = utils.getElementjQueryObject(element_name);
            if($element.length <= 0)
            {
                utils.logWarning("couldn't get element object with name: "+element_name);
                return false;
            }
            if(valobj['trigger'] =='live')
            {
                if(!elementdata[element_name]['live_events_attached'])
                {
                    this.attach_live_events($element,element_live_event_handler);
                    elementdata[element_name]['live_events_attached'] = true;
                }
            }
            else if(valobj['trigger'] =='blur')
            {
               focusvalidations[element_name]=1;
            }
            
            return true;
        }
        
   this.attach_live_events=function($element,func)
   {
        if($element.attr('type') == 'text')
        {
            $element.bind('keyup',func);
        }
        else if($element.attr('type') == 'checkbox' ||
               $element.attr('type') == 'radio')
        {
            $element.bind('keyup',func);
            $element.bind('click',func);
        }
        else if($element.attr('type') == 'file')
        {
            $element.bind('change',func);
        }
        else if($element.is('textarea'))
        {
            $element.bind('keyup',func);
        }
   }
   
   this.dettach_live_events=function($element,func)
   {
        if($element.attr('type') == 'text')
        {
            $element.unbind('keyup',func);
        }
        else if($element.attr('type') == 'checkbox')
        {
            $element.unbind('keyup',func);
            $element.unbind('click',func);
        }
   }
   
   this.livevalidate=function(elementobj,trigger)
       {
            if(!this.settings.enable_smart_live_validation){return;}
            this.pending_validations.trigger_type=false;
			this.validate(elementobj,trigger);
       };
   
   this.messages=
       {
            display:null,
            add_message:function(elementobj,msg)
            {
                if(!this.arr_messages)
                {
                    this.arr_messages = new Array();
                }
                this.arr_messages.push({element:elementobj,message:msg});
            },
            show_messages: function()
            {
                if(this.display && this.arr_messages){this.display.show_messages(this.arr_messages);}
            },
            clear_messages: function(elementobj)
            {
                this.display.clear_messages(elementobj);
                if(this.arr_messages){this.arr_messages.length=0;}
            }
       };
       
       
   this.condition_evaluator =
       {
            evaluate:function(formobj,condition)
            {
                if($.isFunction(condition))
                {
                    return condition(formobj)?true:false;
                }
            }
       };
       
   this.EnableMessageBoxErrorDisplay = function()
       {
            this.messages.display = 
                {
                    show_messages:function(messages)
                    {
                        var allmessages = '';
                        for(var m=0;m < messages.length;m++)
                        {
                            allmessages += messages[m].message+"\n";
                        }
                        if($.trim(allmessages) != '' )
                        {
                            alert(allmessages);
                        }
                    },
                    clear_messages:function(){}
                };
            this.settings.show_all_messages_together = false;
       }
       
   this.EnableOnPageErrorDisplay = function()
       {
            var opts = this.settings.error_popup;
            this.messages.display = 
                {
                    arrmsg_objs:new Array(),
                    popup_options:opts,
                    show_messages:function(messages)
                    {
                        for(var m=0;m < messages.length;m++)
                        {
                            this.arrmsg_objs.push(
                            new ErrorBox(messages[m].element,messages[m].message,this.popup_options));
                        }
                    },
                    clear_messages:function(element_obj)
                    {
                        for(var m=this.arrmsg_objs.length-1; m>=0; m--)
                        {
                            if((element_obj && element_obj.name == this.arrmsg_objs[m].targetname)||
                               !element_obj)
                            {
                                this.arrmsg_objs[m].remove();
                                this.arrmsg_objs.splice(m,1);
                            }
                        }
                    }
                };    
            this.settings.show_all_messages_together = true;
       };
   this.EnableOnPageErrorDisplaySingleBox = function()
       {
            this.messages.display = 
            {
                error_div_id : frmname+'_errorloc',
                show_messages:function(messages)
                {
                    var msg='';
                    for(var m=0;m < messages.length;m++)
                    {
                        msg += '<li>' + messages[m].message+"</li>\n";
                    }
                    if(msg != '')
                    {
                        $('#'+this.error_div_id,formobj).html('<ul>'+msg+'</ul>');
                    }
                },
                clear_messages:function(element_obj)
                {
                    $('#'+this.error_div_id,formobj).html('');
                }
            }
            this.settings.show_all_messages_together = true;
       }
       
   this.validate=function(element,trigger)
       {
            var ret = true;
            var focus_element;
            this.messages.clear_messages(element);
            
            $.each(elementdata,function(k,v)
            {
                elementdata[k]['validation_errors']=false;
            });
            
            for(var v=0;v<validations.length;v++)
            {
				var cur_validn = validations[v];
                var elementobj = null;
                var element_name = cur_validn['element_name'];
                if(element && cur_validn['element_name'] != element.name ){ continue; }
                
                if(trigger && 'correction' != trigger  && cur_validn['trigger'] != trigger)
                {//if the trigger for the current execution does not match the 
                 //trigger of the validation, then do not proceed. (except, when it is a correction)
                    continue;
                }
                
                if(trigger && 'correction' == trigger &&  cur_validn['no_live_trigger'] == true)
                {//for validations like 'remote', live validation during correction is not good
                    continue;
                }
                elementobj = element;
                
                if(cur_validn['condition'] &&
                   this.condition_evaluator.evaluate(formobj, cur_validn['condition'])===false)
                {
                    continue;
                }
                
                if(!elementobj)
                {
                 elementobj = utils.getElementObject(element_name);
                }
                if(!elementobj || elementdata[element_name]['validation_errors'] ){continue;}
				
                var $elementobj = $(elementobj);
                
                if(!elementobj.mirror && !$elementobj.is(':visible')){ continue;}
                
                var result = true;
                
                if(elementobj.sfm_validate)
                {//allows the individual elements to customize the validation
                 //this is useful for customized widgets
                    result = elementobj.sfm_validate(cur_validn['descriptor'], cur_validn['match_value']);
                }
                
                if(!elementobj.sfm_validate || result === 'default')
                {
                    if(!cur_validn['test_even_if_empty'] && utils.isempty(elementobj))
                    { 
                        continue;
                    }
                    if(!cur_validn.fn)
                    {
                        utils.logWarning("validation method not found: "+cur_validn['descriptor']);
                        utils.log(cur_validn);
                        continue;
                    }
                    result = cur_validn.fn(formobj,elementobj,cur_validn['match_value']);
                }
                
                if(false == result)
                {
                    elementdata[element_name]['validation_errors'] = true;
                    
                    if(!elementdata[element_name]['live_events_attached'] && 
                       !elementdata[element_name]['correction_event_attached'])
                    {//There is no live validation for this element. But there is error
                     //When the user tries to correct the error, lets validate it and remove the error 
                     //message when the error is corrected.
                     //The handler is dettached below (after validation)
                        this.attach_live_events($elementobj,element_correction_event_handler);
                        elementdata[element_name]['correction_event_attached'] = true;
                    }
                    if(!cur_validn.pending_reply)
                    {
                        var msg = this.formatMessage(cur_validn);
                        //this.messages.add_message(elementobj,msg);
                        this.messages.add_message(elementobj.mirror?elementobj.mirror:elementobj,msg);
                    }
                    
                    ret=false;
                    if(!focus_element){ focus_element = elementobj; }
                    if(false == this.settings.show_all_messages_together)
                    {
                        break;
                    }
                }
            }
            
            if(!element && this.settings.custom_validation_fn)
            {
            //Handle custom validation function
            //Custom validation is executed in onsubmit only
                if(this.settings.show_all_messages_together ||
                   true == ret)
                {
                    var cust_ret = this.settings.custom_validation_fn(formobj);
                    var errobj= false;
                    if(typeof(cust_ret) == 'object')
                    {
                        this.messages.add_message(cust_ret.elementobj,cust_ret.message);
                        ret=false;
                    }
                    else if(typeof(cust_ret) == 'string')
                    {//we don't know which element this error message belong to . 
                     //So we associate the last input element to this message
                        this.messages.add_message($('input',formobj).last().get(0),cust_ret);
                        ret=false;
                    }
                    else if(cust_ret != true)
                    {
                        this.messages.add_message($('input',formobj).last().get(0),"custom validation returned error");
                        ret=false;
                    }
                }
            }
            if(false == ret)
            {
                if(focus_element && (!trigger || trigger !='blur')){$(focus_element).focus();};
                this.messages.show_messages();
            }
            else
            {//validation success
                if(element && elementdata[element.name] && elementdata[element.name]['correction_event_attached'])
                {
                   this.dettach_live_events($(element),element_correction_event_handler);
                   elementdata[element.name]['correction_event_attached'] = false;
                }
            }
            return ret;
       };//validate

   this.clearMessages=function()
   {
       this.messages.clear_messages(null);
   }
       
   this.formatMessage=function(validation)
       {
            var msg = validation['message'].replace('{name}',validation['element_name']);
            msg = msg.replace('{mvalue}',validation['match_value']);
            return msg;
       }
   this.addAddnlValidationFunction = function(custom_fn)
       {
            this.settings.custom_validation_fn = custom_fn;
       }
   this.init(frmname);
    function ErrorBox(target,content,options)
    {
        var $ = jQuery;
        
        var defaults=
            {
                style:
                {
                    bgcolor:'#333',
                    text_color:'#eee',
                    font_name:'Verdana',
                    font_size:'12px',
                    padding:'5px 40px 5px 10px'
                },
                message_pos:'right',
                message_offset:3
            };
            
        var settings =$.extend(/*deep*/true,defaults,options||{});
        
        
        this.targetname = target.name;
        var $outerdiv;
        var $contentdiv;
        var $closebox;
        
        function create()
        {
            $outerdiv   = $('<div></div>').css({display: 'block',position: 'absolute'});

            $contentdiv = $('<div></div>').css(
            {
                padding: settings.style.padding,
                position: 'relative',
                'z-index': '5001',
                cursor:'default'
            }).addClass('sfm_float_error_box')
            .text(content);
            
            $closebox = $('<div></div>')
            .css({position:'absolute',right:0,top:0,border:0,padding:'5px 10px',margin:0})
            .addClass('sfm_close_box').text('X')
            .hover(
                    function(){$(this).css({'font-weight':'bold'})},
                    function(){$(this).css({'font-weight':'normal'})})
              .click(function()
              {
                $outerdiv.remove();
              });
            
            
            $contentdiv.append($closebox);
            
            $outerdiv.append($contentdiv);
            
            $(target.form).append($outerdiv);
            
            //now position the message
            var posobj = getPositionObj(target);
            var pos = $(posobj).offset();
            var width = $(posobj).outerWidth();
            
            if(settings.message_pos == 'top')
            {
                $outerdiv.css({left:pos.left,top:pos.top - $outerdiv.outerHeight()- settings.message_offset});
            }
            else
            //right
            {
                var msg_left = pos.left + width + settings.message_offset;
                var msg_top = pos.top;
                var right = msg_left + $outerdiv.outerWidth();
                if( right > $(window).width())
                {
                    msg_left -= (right - $(window).width()) + 30 ;
                    if(msg_left < pos.left)
                    {
                        msg_left = pos.left;
                    }
                    msg_top += 10;
                }
                $outerdiv.css({left:msg_left ,top:msg_top});
            }
            
            $outerdiv.mousedown(function(event) 
                {
                    $(this).data('mouseMove', true)
                    .data('mouseX', event.clientX)
                    .data('mouseY', event.clientY);
                    event.stopPropagation();
                });
            
            $outerdiv.parents(':last').mouseup(
                function(){$outerdiv.data('mouseMove', false);});

            $outerdiv.mouseout(function(event){ move(this,event)});
            $outerdiv.mousemove(function(event){move(this,event); event.stopPropagation()});        
        }
        
        function getPositionObj(inputobj)
        {
            var rel_obj = inputobj;

            if(inputobj.parentNode && inputobj.parentNode.className == 'sfm_element_container')
            {
                rel_obj = inputobj.parentNode;
            }
            else
            if(inputobj.type && 
            (inputobj.type =='checkbox'||inputobj.type == 'radio') && 
            inputobj.parentNode)
            {
                rel_obj = inputobj.parentNode;
            }
            return rel_obj;
        }
        

        function move(elementobj,event)
        {
            $element = $(elementobj);
            if(!$element.data('mouseMove')) { return;}
            
            var changeX = event.clientX - $element.data('mouseX');
            var changeY = event.clientY - $element.data('mouseY');
        
            var newX = parseInt($element.css('left')) + changeX;
            var newY = parseInt($element.css('top')) + changeY;

            $element.css('left', newX);
            $element.css('top', newY);
        
            $element.data('mouseX', event.clientX);
            $element.data('mouseY', event.clientY);
        }
        
        this.remove = function()
        {
            $outerdiv.remove();
        }
        
        create();
    }   
}

function sfm_convert_imported_form(formname,url)
{
    var $ = jQuery;
    var formobj = document.forms[formname];
    $(formobj).attr('action',url)
    .attr('accept-charset','UTF-8')
    .attr('method','post')
    .attr('enctype','multipart/form-data')
    .append("<input type='hidden' name='sfm_form_submitted' value='yes' />");
}
    
function sfm_is_valid_extension(filename,extensions)
{
    var found=false;
    var extns = extensions.split(";");
    for(var i=0;i < extns.length;i++)
    {
        var ext_i = $.trim(extns[i]);
        ext = filename.substr(filename.length - ext_i.length,ext_i.length);
        ext = ext.toLowerCase();
        if(ext == extns[i])
        {
            found=true;
            break;
        }
    }
    return found;
}
