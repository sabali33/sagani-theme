Responsive_menu.prototype.get_number_of_menu_to_hide = function(){
    var device_show_number = Math.round( (this.device_width  / this.average_width) );
    if( this.device_width > 900 && this.device_width < 1200 ){
        //head_start = ;
    }else if(this.device_width < 800 && this.device_width > 650){
        //head_start = (this.device_width >650 && this.device_width < 686)? -6 : 0;
    }else if(this.device_width <= 650 ){
        //head_start = 2;
    }else{
        //return -2;
    }
    //if((this.max_nav_screen - this.device_width) > 0 ){
        //return Math.round(((this.max_nav_screen - this.device_width ) / this.average_width) + head_start );
    //}
    console.log(this.average_width, this.device_width);
    return this.nav_list.length - device_show_number;
}
Responsive_menu.prototype.hide_menu_items = function(){
    this.inactive_items.hide();
}
Responsive_menu.prototype.get_menu_items_to_hide = function(){
    
    return this.inactive_items;
}
Responsive_menu.prototype.set_menu_items_to_hide = function(count){
    var items_to_hide = count || (this.get_number_of_menu_to_hide() * -1);
    /*if((this.max_nav_screen < this.nav_width)){
        this.inactive_items = this.nav_list.slice(-2, -1);
    }else{
        //console.log('here');
        this.inactive_items = (this.max_nav_screen - this.device_width) > 0 ? this.nav_list.slice( items_to_hide, -1 ) : [];
    }*/
    this.inactive_items = (this.max_nav_screen - this.device_width) > 0 ? this.nav_list.slice( items_to_hide, -1 ) : [];
}
Responsive_menu.prototype.set_device_width = function(width){
    
    this.device_width = width;
    
}
Responsive_menu.prototype.move_menu_items = function(target_selector){
    
    this.set_menu_items_to_hide();
    if( !this.get_number_of_menu_to_hide()){
        return;
    }
    //console.log(this.get_number_of_menu_to_hide());
    var reserve_selector = target_selector || this.options.target_selector;
    $.each(this.inactive_items, function(id, item){
        $(item).show();
        $(reserve_selector).append(item);
    })
}
Responsive_menu.prototype.restore = function(count){
    $.each( this.inactive_items, function(index, item){
        if( index < count ){
            $(item).insertBefore('.navigation__item.more');
        }
        
    });
}
global.Sagani_Responsive_Menu = Responsive_menu;