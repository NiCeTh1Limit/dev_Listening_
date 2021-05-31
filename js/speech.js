
(function init(){
    var pages = [
        "main",
        "user_data"
    ]
    var Footer = (function (){
        let buttons = [
            "btn_home",
            "btn_prev",
            "btn_next",
            "btn_save"]
        function Footer(){
            // add button click listener
            addButtonClickListener = function(){
                buttons.forEach(id => {
                    let selector = '#'+id;
                    $(selector).click(function (){
                        let fn = methods[id];
                        if (typeof fn === "function"){
                            fn();
                        }
                    })
                })
            }    
            addButtonClickListener()
        }
        var methods = {
            btn_home : function (){
                // title
                $('#top_title').html('')
                // current page (-> hide)
                $('.container div.col-7').not('.visually-hidden').toggleClass('visually-hidden')
                // target page (-> show)
                $('#main').toggleClass('visually-hidden')
                // footer buttons
                $('nav.fixed-bottom button').not('.visually-hidden').toggleClass('visually-hidden')
            },
            btn_next : function(){
                // current page
                let current_page = $('.container div.col-7').not('.visually-hidden')
                current_page.toggleClass('visually-hidden')
                // target page
                switch (current_page.attr('id')) {
                    case "user_data":
                        $('#user_data2').toggleClass('visually-hidden')
                        $('#btn_prev').toggleClass('visually-hidden')
                        // title
                        $('#top_title').html('臉部：靜止與動態(CN VII)')
                        break;
                    default:
                        break;
                }
            },
            btn_prev : function(){
                // current page
                let current_page = $('.container div.col-7').not('.visually-hidden')
                current_page.toggleClass('visually-hidden')
                // target page
                switch (current_page.attr('id')) {
                    case "user_data2":
                        $('#user_data').toggleClass('visually-hidden')
                        $('#btn_prev').toggleClass('visually-hidden')
                        // title
                        $('#top_title').html('個人資料')
                        break;
                
                    default:
                        break;
                }
                
            }
        }
        return Footer;
    }());

    var PageMain = (function (){
        // page id
        let page_id = "main";
        // button ids
        let buttons = [
            "btn_user_data"];

        function PageMain(){
            // add button click listener
            addButtonClickListener = function(){
                buttons.forEach(id => {
                    let selector = '#'+page_id+'_'+id;
                    $(selector).click(function (){
                        let fn = methods[id];
                        if (typeof fn === "function"){
                            fn();
                        }
                    })
                })
            }
    
            addButtonClickListener()            
        }
        var methods = {
            btn_user_data : function (){
                // title
                $('#top_title').html('基本資料')
                // pages
                $("#main").toggleClass('visually-hidden')
                $('#user_data').toggleClass('visually-hidden')
                // footer buttons
                $('#btn_home').toggleClass('visually-hidden')
                $('#btn_next').toggleClass('visually-hidden')
                $('#btn_save').toggleClass('visually-hidden')
            }
        }
        return PageMain;
    }());

    var footer = new Footer();
    var page_main = new PageMain();
}())