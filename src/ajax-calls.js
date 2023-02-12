const Ajax =  () => ({
	get_tpl(options){
        const data = {
            action: 'sagani_temp_loader',
            nonce: options.nonce,
            template_path: options.template_path,
            query: options.query,
            nonce: Sagani.nonce
        }
        return jQuery.get(Sagani.ajax_url, data );
    }
})
export default Ajax;