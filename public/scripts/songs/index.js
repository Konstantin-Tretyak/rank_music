function send_post()
{
    var filter = document.getElementsByClassName('filter')[0];
    var select = filter.getElementsByTagName('select');
    var get_uri = "";
    for(var i=0; i<filter.length;i++)
    {
        /*if(filter[i].checked)
            alert('alright');*/
        if(((filter[i].tagName == "SELECT") && (filter[i].value!="")) || (filter[i].checked))
        {
            get_uri = get_uri + encodeURIComponent(filter[i].getAttribute('name'));
            get_uri = get_uri + "=";
            get_uri = get_uri + encodeURIComponent(filter[i].value);
            get_uri = get_uri + "&";
        }
    }

    //Search
    var search = document.getElementsByClassName('search')[0];
    get_uri = get_uri + encodeURIComponent(search.getAttribute('name'));
    get_uri = get_uri + "=";
    get_uri = get_uri + encodeURIComponent(search.value);

    window.location.search = get_uri;

    //Сделать hidden поле поиска в фильтер
    //return get_uri;
}

var search_button = document.getElementsByClassName('submit_search')[0];
var filter_button = document.getElementsByClassName('submit_filter')[0];

search_button.onclick = send_post;
filter_button.onclick = send_post;