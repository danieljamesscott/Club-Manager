window.addEvent('domready', function() {
    document.formvalidator.setHandler('category_id',
		                      function (value) {
			                  regex=/^[0-9]+$/;
			                  return regex.test(value);
	                              });
    document.formvalidator.setHandler('member_id',
		                      function (value) {
			                  regex=/^[0-9]+$/;
			                  return regex.test(value);
	                              });
});