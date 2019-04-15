var client = algoliasearch('CI2EIBUHHH', 'acf91bc5e3367faf4c70e87dfc2ef866');
var index = client.initIndex('contacts');
autocomplete('#search-input', { hint: false }, 
{
    source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
    displayKey: 'my_attribute',
    templates: {
        suggestion: function(suggestion) {
            return '<span>'+
                suggestion._highlightResult.my_attribute.value
                +'</span>';
        }
    }
});