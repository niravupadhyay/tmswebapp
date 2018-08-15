//jquery autocomplete combobox widget function
$( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( 'id', this.element.attr( 'id' )+'-input' )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
 
          if(this.element.attr( 'id' ) === "selSupplier" || this.element.attr( 'id' ) === "selCustomer" || this.element.attr( 'id' ) === "selAccount")
          {
              this.input.attr("maxlength","10");
          }
          else if(this.element.attr( 'id' ) === "country" || this.element.attr( 'id' ) === "state")
          {
              this.input.attr("maxlength","2");
          }
            
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            
            //alert(ui.item.option.getAttribute("name"));
            var ddType = ui.item.option.getAttribute("name");
            //alert("Ok" + ddType);
            if(ddType === "supp" || ddType === "cust" || ddType === "cntry" || ddType === "fol" || ddType === "carg")
            {
                //alert(ddType);
                showData(ui.item.option.value, ui.item.option.getAttribute("name"));
            }
            else if(ddType === "uname")
            {
                //alert(ddType);
                loadUserSCA();
            }
            else if(ddType === "acctmstr")
            {
                //alert(ddType);
                loadAcctData(ui.item.option.value, document.getElementById('selCustomer').value, document.getElementById('selSupplier').value);
            }
            else if(ddType === "rpt")
            {
                //alert(ddType);
                loadReportUI(ui.item.option.value);
            }
            
            this._trigger( "select", event, {
              item: ui.item.option
            });
            
          },
          
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        //if(this.input.attr("id") === "selSupplier-input" || this.input.attr("id") === "selCustomer-input" || this.input.attr("id") === "country-input" || (this.input.attr("id") === "state-input" && this.element.children('option').length > 1))
        //{
            var value = this.input.val(),
              valueLowerCase = value.toLowerCase(),
              valid = false;
            this.element.children( "option" ).each(function() {
              if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                this.selected = valid = true;
                return false;
              }
            });

            // Found a match, nothing to do
            if ( valid ) {
              return;
            }

            // Remove invalid value
            this.input
              .val( "" )
              .attr( "title", value + " didn't match any item" )
              .tooltip( "open" );
            this.element.val( "" );
            this._delay(function() {
              this.input.tooltip( "close" ).attr( "title", "" );
            }, 2500 );
            this.input.autocomplete( "instance" ).term = "";
        //}
//        else if(this.input.attr("id") === "selAccount-input")
//        {
//            var value = this.input.val();
//            if(value.toString().length > 0 && value.toString().length < 10)
//            {
//                while (value !== "" && value.toString().length < 10) {
//                    value = '0' + value;
//                }
//                this.input.val(value);
//            }
//        }
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
 
});
