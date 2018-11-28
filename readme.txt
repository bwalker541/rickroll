=== How To RickRoll Your WordPress Clients ===
Contributors: bonniew
Tags: admin, login, rickroll, dashboard, users, 
Requires at least: 4.9
Tested up to: 4.9.8
Stable tag: 18.11beta
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Removes most default WordPress dashboard widgets and replaces with one that plays "Never Gone Give You Up" by Rick Astley

== Description ==

This plugin was written by Bonnie Walker, a Freelance Full Stack WordPress Developer as a way to publish sample code publicly without giving away any proprietary information of her current or past clients. I don't actually recommend using this plugin. It's annoying. It's a joke. Literally.

How To RickRoll Your WordPress Clients will:

Replace most of the default WordPress admin dashboard widgets with one that plays a video of "Never Gonna Give You Up" by Rick Astley, thereby "RickRolling" your clients or co-workers when they log into the WordPress Admin Dashboard

The dashboard widget hooks into and uses the WordPress oEmbed code to play a video in the Admin Panel, based only on the URL of the video

Once a user has been RickRolled, a user meta tag is set so that they only get RickRolled once and their WP Dashboard goes back to "normal" thereafter. They can probably also dismiss it permanently by using the Screen Options checkbox on their Dashboard, if they know that feature. (Ha! Well, here's how to motivate them to figure out the WordPress Admin features!)

The Settings > Read page has an option where you can change which video gets played by submitting the URL of any Vimeo or YouTube video (or any oEmbed-compatible media file). So, you know, if your favorite client is in a "Who can avoid hearing WHAM's 'Last Christmas' for the longest during december" contest, you can mess with her. Not that I did that.

There is also a "RickRoll Report" in the Users admin menu where you can see how many users have been RickRolled and the dates they were RickRolled.

You can reset the RickRolls and RickRoll everyone all over again, without deactivating or uninstalling! Yippee

The Users main page has a column that displays when each user was RickRolled, if they have been yet.

I don't recommend using this plugin, so for heaven's sake, please deactivate it and uninstall it when you are done RickRolling your own clients!

Uninstall removes the video option and the user meta data.

At this time, this RickRoll plugin will work best with users who have author roles and above; subscribers in particular get sent to their profile page and not the dashboard when they log in.

When WordPress is active in a release cycle, it is probably not the best time to be RickRolling your clients anyway, and any new pointers or dashboard announcements that are added for the release may not be automatically dismissed by this plugin. And they probably shouldn't be! Just sayin'

When I have time, I will also be adding Internationalization / Localization and Multisite compatible versions, for the sake of showcasing my WordPress Development skills and not necessarily for the sake of this plugin! 

Credits: Thank you AK Smith for the inspiration! And to Jennifer who is probably going to stick to knitting from now on.  Your websites are safe again, I promise!  Thanks also to Rick Astley. (Wow, I never thought I'd say that!)


== Installation ==

1. Upload the `rickroll` folder to your WordPress plugins directory (typically 'wp-content/plugins')
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings > Read and edit the video link, if desired
4. Visit your own admin dashboard and make sure it works! (Yes, you RickRoll even yourself!)


== Frequently Asked Questions ==

= Why Did You Write This Plugin? =

I wanted to have a set of code to post publicly as a code sample. And have a little fun.

= Does your teenager think you're weird for RickRolling yourself so many times while you were developing this plugin? =

Yes. Weird AND Embarrassing.

= Should I Use This Plugin? =

No. Definitely not. Review my code and how I work with WordPress. Don't actually install this! It works, but man, is it annoying! Don't say I didn't warn you! Everyone will hate you. My clients hate me now. Sigh.

= Which Rick Astley Video? =

The current default video is on Vimeo at: https://vimeo.com/148751763

If you want to pick a different one, go ahead!  You can change it in Settings > Read

= How Do I Know If Anyone Has Been RickRolled? =

Go to Users > RickRoll Report

You can also see the exact date each user was RickRolled on the Users admin page

= Why Do I Have To Get RickRolled Myself? =

Because *I* get to have fun too as the plugin developer! 


= Why Won't oEmbeded YouTube Videos Autoplay? =

Don't ask me, ask YouTube. I tried and after 15 minutes decided it wasn't worth it for just a code sample. Sorry, but I have to spend the time on you know, real work!  I guess I now have a 15 minute head start if this comes up in a real project. 


= Why Do Your Release Numbers Look Weird? =

I like wine. Hello! Plus, after 2.0, traditional software numbers begin to lose their significance and potentially have marketing issues (if you care about that sort of thing).  I am not about to have to make a spreadsheet to keep track of when I released the beta version of "How To RickRoll Your WordPress Clients". And I guess if it's good enough for Ubuntu, it's good enough for me!




== Changelog ==

= 18.11beta =
* Release date: 2018-11-30
* Hello World. Actually Hello Github, to be precise. And, hello Rick Astley!
