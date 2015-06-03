$(document).ready(function() {
   // Workaround for bug in mouse item selection
   var typeaheadSource = ['John', 'Alex', 'Terry'];
   $('input.typeahead').typeahead({
    ajax: {
        url: window.location.pathname+"/search",
        timeout: 500,
        displayField: "course_name",
        triggerLength: 1,
        method: "post",
        loadingClass: "loading-circle",
        
      }

});

   })


      
         