ExactTarget-DEManager
=====================

This is a plugin which is needed to make Gravity Forms and Forms 3rd Party Integration work with ExactTarget's DEManager API for one of my clients. At this point there are no settings to use. Just activate and let it work. In the future it may evolve to automate the ExactTarget implementation within WordPress.
There are three tasks for the plugin.
1. Create urls which can be passed to ExactTarget's DEManager. This is done by using the urls for exacttarget-success.php and exacttarget-failure.php files in the plugin folder
2. Pass success condition to Forms 3rd Party Integration through the contents of the success url. This is the contents of exacttarget-success.php. Currently the content is the word "success" which must be entered in the Forms 3rd Party Integration settings page. If the contents of exacttarget-success.php are changed, the success condition must be changed.
3. Create custom parameters for Gravity Forms to pass the urls created by ExactTarget DEManager. The parameters are currently exacttarget_success_url and exacttarget_failure_url. When the plugin is created these parameters can be used to pass the success url and the error url to any Gravity Forms field.
