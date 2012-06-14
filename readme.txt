=== Squoze ===
Contributors: bfindleton
Donate link: http://arbalestmedia.com/squoze
Tags: responsive, one-column, two-column, three-column, left-sidebar, right-sidebar, flexible-width, custom-background, custom-colors, custom-hearder, featured-images, theme-options, translation-ready, 3.4
Requires at least: 3.4
Tested up to: 3.4
Stable tag: 1.0
License: GPLv2

Squoze is a "bare" developer's theme for WP 3.4, not so much a framework as a toolkit to kickstart your next theme project.

== Description ==

This theme is a branch of the ['_s' theme](https://github.com/Automattic/_s "_s theme") (see below) from Automattic. It includes the core files and additional modifications to make it more resposive and more of a starter toolbox.

In addition it includes a fleshed out custom post type, fluid grid layout, a simple widget, a shortcode manager, media query defaults for changing the default layout dynamically and the Option Framework from Devin Price, including options for layout selection and sidebar sizing and all strings are "i18n" ready.

The theme is meant to be a development starting point, not a fully styled or functional site. Large chunks of the CSS has been commented out with selectors that I think should prove handy but have no default values assigned, ready for your loving attention. I added the features mentioned above to start building new themes from though they should be easy enough to edit or jettison if their functionality isn't required.

== Details ==

Squoze supports the Header and Background capabilities and so can be setup through the new Theme Customize/Live Preview feature available in WP 3.4.

After Squoze is activated you can start trimming or adding features as you desire. It's ready to go.

Several features have been added to the original _s theme. They are instantiated in functions.php unless otherwise indicated. Comment out or remove them from function.php if you don't need them.

These include:

* "Squoze About Widget" - This is a simple widget to add an "About Me" style widget to a sidebar. It uses [Gravatar](http://gravatar.com/ "Gravatar") to grab your mugshot so don't use it unless you have an account there. It can be used as a jumping off point for developing your own widgets.

* "Options Framework Theme" - For option management Squoze is using the [Options Framework Theme](http://wptheming.com/options-framework-theme/ "Options Framework") from WP Theming. At the top of the Basic Settings tab of Admin->Appearance->Theme_Options are four fields that are used in the theme: Default Layout, Left Sidebar Columns, Right Sidebar Columns and Custom Stylesheet.

1. Default Layout defines the default display layout: Full page, Two Column Left sidebar, Two Column Right sidebar or Three Column with both Left and Right sidebars. This can be overriden for individual pages using page templates.
2. Left and Right Sidebar Columns refers to the number of grid columns (out of 12 total) that each sidebar should use. For instance, setting both left and right values to Four would result in any Three Column layout pages having 4 columns left over for the content in the middle.
3. Custom Stylesheet gives users a way designate their own stylesheet to override existing CSS settings as well as add their own without having to resort to a child theme.

The remaining settings fields are supplied as part of the Options Framework. Use and/or discard as your new theme dictates.

* "Products" Custom Post Type - Under "Posts" on the Admin screen is "Products," a custom post type for you to modify or remove as your theme requires. It includes a custom taxonomy ("Catalog") and a custom meta box. Again, use or lose at your discretion.

* Shortcodes - A shortcode management class has been added that ties into the Product custom post type mentioned above. It uses "filename.phtml" files in the "/views" directory as templates for display.

* Theme Support - All possible 'add_theme_support' options are included in funtion.php. Be aware that "add_theme_support( 'post-thumbnails' )" includes calls to 'set_post_thumbnail_size' and 'add_image_size' so set these to your preferred values if you are going to be using this feature.

* Menus - There are two main menus available, Primary and Secondary. The call to the Secondary menu is in the same "header" block as the call to the Primary menu. Move or remove the Secondary menu as appropriate.

* Fluid Grid - Squoze uses the fluid grid system from Twitter Bootstrap.

* CSS - The style.css file includes vast swaths of commented out sections with selectors that I've found helpful in my own layouts but didn't want to force you, the developer, into having to go in and futz around with for your own theme. Use, ignore or delete as you see fit.

Also, "* {box-sizing: border-box;}" is the first setting in the Globals section. You can change this if you wish but, really, why would you?

* "squoze.js" - This was hijacked from the original _s file, "small-menu.js" but has some code included to handle width resizing in certain layouts. Know that its breakpoint is set to 640px.

* "languages/squoze.pot" - While Squoze has been localized there are currently no translations available. Volunteers welcome. (I would but my Spanish sucks)

== Frequently Asked Questions ==

= Squoze? Really? =
This was born out of making my old, static site responsive, or "squeezable" as it were. I figured "squeezed" was pretty much off the table by this point and opted for bad grammer instead.

== Change log ==

= ver 1.0.1 =
* Changed screenshot for review compliance
* Removed non-printable characters from one of the source files

= ver 1.0 =
* Initial rollout, no changes

== _s readme.txt ==

Below is the original _s readme.txt file content. Please note the following changes:

1. "inc/custom_header.php" has been removed.
2. "js/small-menu.js" has been renamed "js/squoze.js" and includes several additions. All original code is still intact.
3. "/layouts" and the files therein has been removed.
4. You should be able to dispense with the multiple search-and-replace steps and just search for "squoze" and replace it with your own theme-slug and search for "Squoze" and replace it with your capitalized theme name. Remember to generate a new ".pot" localization file when you're done ;)

== _s ==

Hi. I'm a starter theme called _s, or underscores, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here ...

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A sample custom header implementation in inc/custom-header.php that can be activated by uncommenting one line in functions.php and adding the code snippet found the comments of inc/custom-header.php to your header.php template.
* Custom template tags in inc/template-tags that keep your templates clean and neat and prevent code duplication.
* Sample theme options in /inc/theme-options/ that can can be activated by uncommenting one line in functions.php.
* Some small tweaks in /inc/tweaks.php that can improve your theming experience. They can be activated by uncommenting one line in functions.php.
* Keyboard navigation for image attachment templates. The script can be found in js/keyboard-navigation.js. It’s enqueued in functions.php.
* A script at js/small-menu.js that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It’s enqueued in functions.php.
* 5 sample CSS layouts in /layouts: Two sidebars on the left, two sidebars on the right, a sidebar on either side of your content, and two-column layouts with sidebars on either side.
* Smartly organized starter CSS in style.css that will help you to quickly get your design off the ground.
* The GPL license in license.txt. :) Use it to make something cool.

== Getting Started ==

The first thing you want to do is copy the _s directory and change the name to something else. Like, say, megatherium. Then you'll need to do a three-step find and replace on the name in all the templates.

1. Search for _s inside single quotations to capture the text domain.
2. Search for _s_ for to capture all the function names
3. Search for _s with a space before it to replace all the occurrences of it in comments. (You'd replace this with the capitalized version of your theme name.)

or ...

Search for:'_s'
Replace with:'megatherium'
Search for:_s_
Replace with:megatherium_
Search for: _s
Replace with: Megatherium

Then, update the stylesheet header in style.css and the links in footer.php with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say but harder to do: make an awesome WordPress theme. :)

Good luck!
