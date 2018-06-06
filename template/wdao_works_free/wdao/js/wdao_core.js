
jQuery(function() {
    // 取消冒泡
    function cancelbuble(e) {
        if (e && e.stopPropagation) {
            //W3C取消冒泡事件
            e.stopPropagation();
        } else {
            //IE取消冒泡事件
            window.event.cancelBubble = true;
        }
    }

	    jQuery('.search-show').on('click', function(event) {
		jQuery(this).hide()
		jQuery('.search-off').show()
		jQuery('body').addClass('search-active')
		
	})

	jQuery('.search-off').on('click', function(){
		jQuery(this).hide()
		jQuery('.search-show').show()
		jQuery('body').removeClass('search-active')
	})
    
})