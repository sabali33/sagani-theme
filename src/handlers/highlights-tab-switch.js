import Ajax from '../ajax-calls';

const Highlights_On_Tab_Switch = ($, loaded, e) => {
        console.log(e);
    const cat = $( e.target ).data( 'cat-ids' );
    console.log(cat);
    if( loaded.indexOf(cat) != -1 ) {
        return;
    }
    let wait_spinner = $('.waiting-response');
    wait_spinner.addClass('active');
    
    const data = {
        template_name: 'hightlights',
        query: {
            cat: cat,
            posts_per_page: $( e.target ).data( 'ppp' )
        }
    }
    const parent_element = e.target.parentElement;
    const parent_class = $(parent_element).attr('class');
    
    const large_post_element = $(`.${parent_class.replace(' ', '.')} .large-post` );
    const post_list_element = $(`.${parent_class.replace(' ', '.')} .post-list` );
    
    Ajax().get_tpl(data).done( response => {
        if( response.error ){
            console.log(response.error );
            return;
        }
        if(response.data.large){
            $(large_post_element).html( response.data.large );
            
        }
        if(response.data.list){
            $(post_list_element).html( response.data.list );
        }
        loaded.push(cat);
        wait_spinner.removeClass('active');
        
    });
}
export default Highlights_On_Tab_Switch;