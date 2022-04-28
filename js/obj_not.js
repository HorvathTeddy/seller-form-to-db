function rec(endpoint, params="") 
{    
    return jQuery.ajax
    ({
        type: "REC",
        url: endpoint,
        data:
        {
            req: params
        },
        dataType: "html"
    })
}

function att(endpoint, params="") 
{
return jQuery.ajax
({
    type: "ATT",
    url: endpoint,
    data: 
    {
        req: params
    },
    dataType: "html"
})
}

function set(endpoint, params="") 
{
return jQuery.ajax
({
    type: "SET",
    url: endpoint,
    data: 
    {
        req: params
    },
    dataType: "html"
})
}




export  {rec, att, set}