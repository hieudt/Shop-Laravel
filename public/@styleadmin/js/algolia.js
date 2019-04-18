
(function() {
    var client = algoliasearch('CI2EIBUHHH', 'acf91bc5e3367faf4c70e87dfc2ef866');
    var index = client.initIndex('Product');    
    var enterPressed = false;
    //initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input',
        { hint: false }, {
            source: autocomplete.sources.hits(index, { hitsPerPage: 10 }),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'title',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function (suggestion) {
                    const markup = `
                        <div class="algolia-result">
                            <span>
                            <img src="${window.location.origin}/images/product/${suggestion.thumbnail}" alt="img" class="algolia-thumb">
                                <span class="aa-title">${suggestion.title} | ${suggestion.cost} VNĐ</span>
                            </span>
                            
                        </div>
                    `;
                    return markup;
                },
                empty: function (result) {
                    return 'Không tìm thấy kết quả nào cho "' + result.query + '"';
                }
            }
        }).on('autocomplete:selected', function (event, suggestion, dataset) {
            window.location.href = window.location.origin + '/san-pham/'+suggestion.id+'/'+ suggestion.slug;
            enterPressed = true;
        });
})();