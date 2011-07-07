window.addEvent('domready', function() {
    document.formvalidator.setHandler('name',
		                      function (value) {
			                  regex=/^.*$/;
			                  return regex.test(value);
	                              });
    document.formvalidator.setHandler('alias',
		                      function (value) {
			                  regex=/^.*$/;
			                  return regex.test(value);
	                              });
    document.formvalidator.setHandler('picture',
		                      function (value) {
			                  regex=/^.*$/;
			                  return regex.test(value);
	                              });
    document.formvalidator.setHandler('coach',
		                      function (value) {
			                  regex=/^.*$/;
			                  return regex.test(value);
	                              });
    document.formvalidator.setHandler('trainer',
		                      function (value) {
			                  regex=/^.*$/;
			                  return regex.test(value);
	                              });
    document.formvalidator.setHandler('manager',
		                      function (value) {
			                  regex=/^.*$/;
			                  return regex.test(value);
	                              });
});