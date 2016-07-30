var search_button = document.getElementsByClassName('submit_search')[0];
var filter_button = document.getElementsByClassName('submit_filter')[0];
var sort_button = document.getElementsByClassName('submit_sort')[0];

function send_post()
{
    var filter = document.getElementsByClassName('filter')[0];
    var select = filter.getElementsByTagName('select');
    var get_uri = "";
    for(var i=0; i<filter.length;i++)
    {
        if(((filter[i].tagName == "SELECT") && (filter[i].value!="")))
        {

            for (var j = 0; j < filter[i].options.length; j++)
            {
                if (filter[i].options[j].selected)
                {
                    get_uri = get_uri + encodeURIComponent(filter[i].getAttribute('name'));
                    get_uri = get_uri + "=";
                    get_uri = get_uri + encodeURIComponent(filter[i].options[j].value);
                    get_uri = get_uri + "&";
                }
            }
        }
    }

    //Search
    var search = document.getElementsByClassName('search')[0];
    if(search.value)
    {
        get_uri = get_uri + encodeURIComponent(search.getAttribute('name'));
        get_uri = get_uri + "=";
        get_uri = get_uri + encodeURIComponent(search.value);
        get_uri = get_uri + "&";
    }

    var sort = document.getElementsByClassName('sort')[0];
    if(sort)
    {
        var sort_select = sort.getElementsByTagName('select')[0];
        if(sort_select.value)
        {
            get_uri = get_uri + encodeURIComponent(sort_select.getAttribute('name'));
            get_uri = get_uri + "=";
            get_uri = get_uri + encodeURIComponent(sort_select.value);
        }
    }

    window.location.search = get_uri;
}

$(".search_form").on('submit',
          function(event)
          {
            event.preventDefault();
            send_post();
          });

$(".filter").on('submit',
          function(event)
          {
            event.preventDefault();
            send_post();
          });

$(".sort_filter").on('submit',
          function(event)
          {
            event.preventDefault();
            send_post();
          });