function Toastify(t){this.options={},t&&(this.options=t,this.addEventListeners())}Toastify.prototype.setTemplate=function(){var t=this.options.msg,s=this.options.status,o=o="error"===s?"danger":"success";"warning"==s?(o="warning",this.template=`<div class="toast">\n    <div class="alert alert-${o}" role="alert" style="display:flex;">\n      <span class="icon sm icon-danger d-inline-block align-middle"></span>\n      <p class="error-body d-inline-block align-middle">${t}</p>\n    </div>\n  </div>`,this.templateV2=`<div class="alert alert-${o}" role="alert" style="margin-top: 4px; display: flex;">\n      <span class="icon sm icon-danger d-inline-block align-middle"></span>\n      <p class="error-body d-inline-block align-middle">${t}</p>\n    </div>`):(this.template=`<div class="toast">\n        <div class="alert alert-${o}" role="alert" style="display:flex;">\n          <span class="icon sm icon-${o} d-inline-block align-middle"></span>\n          <p class="error-body d-inline-block align-middle">${t}</p>\n        </div>\n      </div>`,this.templateV2=`<div class="alert alert-${o}" role="alert" style="margin-top: 4px;display: flex;">\n          <span class="icon sm icon-${o} d-inline-block align-middle"></span>\n          <p class="error-body d-inline-block align-middle">${t}</p>\n        </div>`)},Toastify.prototype.toast=function(t,s){t&&(this.options.msg=t,this.options.status=s),this.setTemplate();var o=this.options.PARENT||"body";clearTimeout(this.fadeTimeout),$(o+" .toast").remove(),$(o).append(this.template),setTimeout(function(){$(o+" .toast").addClass("show")},0),this.options.AUTO_FADE&&(this.fadeTimeout=setTimeout(function(){$(o+" .toast").removeClass("show")},this.options.AUTO_FADE_TIMEOUT))},Toastify.prototype.toastV2=function(t,s){t&&(this.options.msg=t,this.options.status=s),this.setTemplate();var o=this.options.PARENT||"body";clearTimeout(this.fadeTimeout),$(o+" .toast").hasClass("show")?$(o+" .toast").append(this.templateV2):($(o).append(this.template),document.querySelector(o+" .toast").style.setProperty("box-shadow","none","important"),$(o+" .toast").addClass("show")),this.options.AUTO_FADE&&(this.fadeTimeout=setTimeout(function(){$(o+" .toast").removeClass("show"),setTimeout(()=>{$(o+" .toast").remove()},400)},this.options.AUTO_FADE_TIMEOUT))},Toastify.prototype.addEventListeners=function(){this.options.CLOSE_ON_CLICK&&$(this.options.PARENT||"body").on("click",".toast",function(t){t.preventDefault(),$(this).removeClass("show"),setTimeout(()=>{$(this).remove()},400)})},Toastify.prototype.onDisappear=function(t){var s=this.options.PARENT||"body";s+=" .toast",$(s).on("transitionend",function(){$(s).hasClass("show")||t()}),$(s).on("animationend",function(){$(s).hasClass("show")||t()})};