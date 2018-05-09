# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.38)
# Database: xlab
# Generation Time: 2018-05-09 06:37:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tb_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_comments`;

CREATE TABLE `tb_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tb_comments` WRITE;
/*!40000 ALTER TABLE `tb_comments` DISABLE KEYS */;

INSERT INTO `tb_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`)
VALUES
	(1,8,'admin','admin@x-lab.com','http://x-lab.com','','2018-05-09 13:19:21','0000-00-00 00:00:00','Test',0,'1','','',0,0),
	(2,9,'admin','admin@x-lab.com','http://x-lab.com','','2018-05-09 13:26:21','0000-00-00 00:00:00','Test2',0,'1','','',0,0),
	(3,9,'unnamed','admin@x-lab.com','http://x-lab.com','','2018-05-09 13:30:04','0000-00-00 00:00:00','jsdkasb',0,'1','','',0,0);

/*!40000 ALTER TABLE `tb_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_posts`;

CREATE TABLE `tb_posts` (
  `ID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` int(20) unsigned NOT NULL DEFAULT '0',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `title_slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_count` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tb_posts` WRITE;
/*!40000 ALTER TABLE `tb_posts` DISABLE KEYS */;

INSERT INTO `tb_posts` (`ID`, `post_author`, `post_date`, `post_title`, `post_content`, `post_status`, `title_slug`, `post_modified`, `post_type`, `comment_status`, `comment_count`)
VALUES
	(8,31,'2018-05-09 06:36:42','Libraries 101 is The Basics','<p>Since we launched support for Sketch Libraries, we&rsquo;ve seen widespread adoption by teams of all sizes. This new way of working with Sketch and Abstract has opened up many use cases worth exploring. In this article, I&rsquo;ll dive into some of our best practices to help you use Libraries and Linked Libraries in Abstract.</p>\r\n\r\n<p>Libraries 101 &mdash; The&nbsp;Basics</p>\r\n\r\n<p>A Library is an ordinary Sketch document with symbols that are used in other Sketch documents. If you want to use the same Library across multiple Abstract Projects, you can link a Library file from multiple Projects as a Linked Library. Symbols updated in your Linked Library will update instances of the Symbol across your team&rsquo;s Projects.</p>\r\n\r\n<p>Benefits of using Libraries in Abstract:</p>\r\n\r\n<ul>\r\n	<li>Increase design consistency across Projects and Teams</li>\r\n	<li>Reduce project-size and improve performance &mdash; in Sketch&nbsp;<em>and</em>&nbsp;Abstract</li>\r\n	<li>Organize and view Libraries as individual files</li>\r\n	<li>Update and Sync symbols across files in a Project</li>\r\n	<li>Track and Commit changes made to each Symbol</li>\r\n</ul>\r\n\r\n<p>Convert an existing file into a Sketch&nbsp;Library</p>\r\n\r\n<ol>\r\n	<li>Access your Files tab in a Project</li>\r\n	<li>Right-click the file you&rsquo;d like to use as a Library</li>\r\n	<li>Choose &ldquo;Use as Library&hellip;&rdquo;</li>\r\n	<li>Done ???? Abstract automatically makes Libraries available in your project files, saving you time and confusion as you work on multiple projects throughout the day.</li>\r\n</ol>\r\n\r\n<p>When you select &ldquo;<strong>Use as Library&hellip;&rdquo;</strong>, the Sketch icon for that file will turn from orange to pink and Abstract creates a commit to record the change. If you ever want to stop using a file as a Library file, you can go into the same menu and uncheck &ldquo;<strong>Use</strong>&nbsp;<strong>as Library&hellip;&rdquo;&nbsp;</strong>to reverse the process.</p>\r\n\r\n<p>How to add Sketch Libraries to your&nbsp;Project</p>\r\n\r\n<p><strong><em>New Library File</em></strong></p>\r\n\r\n<ol>\r\n	<li>Open up any Branch<em>&nbsp;</em>within an Abstract Project and select the Files tab</li>\r\n	<li>Select&nbsp;<strong>Add File</strong></li>\r\n	<li>See&nbsp;<strong>&ldquo;Create Sketch File as Library&hellip;&rdquo;</strong>&nbsp;in the screenshot below</li>\r\n	<li>Done ????</li>\r\n</ol>\r\n\r\n<p><img src=\"https://cdn-images-1.medium.com/max/1600/1*YN2w8cTYcacT6YU5lI7BJw.png\" /></p>\r\n\r\n<p>Access these options through the &ldquo;Add File&rdquo;&nbsp;button.</p>\r\n\r\n<p><strong><em>Existing Library File</em></strong></p>\r\n\r\n<ol>\r\n	<li>Open up any Branch<em>&nbsp;</em>within an Abstract Project and select the Files tab</li>\r\n	<li>Select&nbsp;<strong>Add File</strong></li>\r\n	<li>If you have already made a Library containing your design elements, click&nbsp;<strong>Import Sketch File as Library&hellip;</strong></li>\r\n	<li>Select the correct file from your computer and click Import</li>\r\n	<li>Once you import the files (or replace the files), you&rsquo;ll have to manually replace the symbols so they reference the correct file. It is possible to use a third-party plugin &mdash; like&nbsp;<a href=\"https://github.com/sonburn/symbol-swapper\" target=\"_blank\">Symbol Swapper</a> &mdash; to help speed-up this process.</li>\r\n</ol>\r\n\r\n<p><strong><em>Library File In Abstract</em></strong></p>\r\n\r\n<ol>\r\n	<li>Open up any Branch<em>&nbsp;</em>within an Abstract Project and select the Files tab</li>\r\n	<li>Select&nbsp;<strong>Add File</strong></li>\r\n	<li>If you have already made a Library containing your design elements in Abstract, click &ldquo;<strong>Link Library&hellip;&rdquo;</strong></li>\r\n	<li>Select the Project your Library is located in</li>\r\n	<li>Select one or multiple Libraries and click&nbsp;<strong>&ldquo;Link Libraries&rdquo;</strong></li>\r\n</ol>\r\n\r\n<p><img src=\"https://cdn-images-1.medium.com/max/1600/1*hmernPNJMNppyHwAFsYOQg.png\" /></p>\r\n\r\n<p>Once you link a Library to your Project, open your Sketch Files and follow Sketch&rsquo;s Symbol Update Flow. When changes are made to the Library, You&rsquo;ll have the option to update your symbols from Master via an alert in the top right. No more out of date symbols or design discrepancies. Crazy right?</p>\r\n\r\n<p><img src=\"https://cdn-images-1.medium.com/max/1600/1*mz41asalojLjnS1wAnRpvA.png\" /></p>\r\n\r\n<p>Notice that little alert in the top right?&nbsp;☝️</p>\r\n\r\n<h3>Using Libraries 201 &mdash; Organization and Multiple&nbsp;Projects</h3>\r\n\r\n<p>Now that we&rsquo;ve covered the basics, lets dig a bit more into best practices. Each design team faces its own unique challenges and &mdash; as a disclaimer &mdash; it&rsquo;s part of why I love working with design teams. My suggestions in this post are based on how we operate at Abstract and includes trends I&rsquo;ve seen across other teams. With that in mind, there is no &ldquo;best&rdquo; way to use Libraries, and I hope these tips can guide you in your quest for Library enlightenment.</p>\r\n\r\n<p>Common Questions</p>\r\n\r\n<blockquote>Q: How should I organize my Libraries? One large Sketch File, or a couple smaller ones? We have symbols in a library and sometimes just on a page on our Project, what should I do?</blockquote>\r\n\r\n<p><strong>✅ Do:</strong>&nbsp;Structure your Libraries in a way that is intuitive for not only yourself but your team with clear naming conventions.</p>\r\n\r\n<p><strong>✅ Do:&nbsp;</strong>Separate Libraries from your working Files. Consider breaking up large Library files into multiple files. This provides your team with the option only to sync and add aspects of your Library that are relevant to their project. Not having to sync unnecessary components and files is a plus here.</p>\r\n\r\n<p><strong>???? Do&nbsp;<em>Not</em>:&nbsp;</strong>Create a massive Library called &ldquo;Aldens_Symbols_VFinal3.sketch&rdquo; containing out of date symbols and lacking structure your colleagues will understand.</p>\r\n\r\n<blockquote>Q: Where should my Library files live in Abstract? We have a couple Libraries, should you just keep them all within a single project or across a couple?</blockquote>\r\n\r\n<p><strong>✅ Do:&nbsp;</strong>Create a Project for Libraries that change with low frequency. we recommend to group those libraries in a&nbsp;<em>&ldquo;Design Systems&rdquo; Project</em>&nbsp;so that they can be easily found, updated, and linked to. Check out the image below for a glimpse into how we&rsquo;ve set up our Libraries.</p>\r\n\r\n<p><strong>✅ Do:</strong>&nbsp;Add libraries that are not applicable to other Project at the&nbsp;<em>Project level</em>alongside your other files. This works well if your team is separated by platform or project.</p>\r\n\r\n<p><strong>???? Do&nbsp;<em>Not</em>:&nbsp;</strong>Keep stray copies on your computer and send v_4_2018Components.sketch via slack or email to a team member. Remember the single source of truth concept? Sounds good right? Let&rsquo;s practice that together. ????</p>\r\n\r\n<p><img src=\"https://cdn-images-1.medium.com/max/1600/1*7UoOPV1tGffV79duI3R6fA.png\" /></p>\r\n\r\n<p>Design Systems&nbsp;Project</p>\r\n\r\n<p>Above, you&rsquo;ll see our Project,&nbsp;<em>Design System.</em>&nbsp;We use this Project to group Libraries with symbols used across our products. Most of these Libraries are linked to multiple projects and used across our design team to reduce variables and design discrepancies. As you can see, each library is its own file and organized in a way that&rsquo;s easy to navigate for a new designer.</p>\r\n\r\n<blockquote>Q: What will I see in Sketch after I&rsquo;ve linked my Libraries in Abstract? I&rsquo;ve attached Libraries to my Project, can I really just use them now? Where can they be accessed?</blockquote>\r\n\r\n<p><strong>Walkthrough:</strong></p>\r\n\r\n<p>After linking a library to a Project, click &ldquo;Edit in Sketch&rdquo; to create a Branch, or Open Untracked. Once in Sketch, access the Insert drop down in the Menu Bar. Your Library Symbols will be grouped and ready to be added where needed.</p>\r\n\r\n<p>The Library File Name will be displayed along with where it&rsquo;s linked from within Abstract. Organization of Library files and clear naming conventions are important. ????</p>\r\n\r\n<blockquote>Q: Say I create a branch in a project with a linked library then commit changes. Can I specifically merge those library changes &mdash; so they update across all my projects &mdash; without merging changes from other files I made on that branch?&rdquo;</blockquote>\r\n\r\n<p>When working in a Branch, we do not support merging of just Library changes. You&rsquo;ll need to Merge the entire Branch. The thinking here is that changes made to a Linked Library can have a potentially large impact across multiple Projects/Files and should be done with a full Merge to Master.</p>\r\n\r\n<p><img src=\"https://cdn-images-1.medium.com/max/1600/1*ghLRVQ76ynk61CF9csvNVg.png\" /></p>\r\n\r\n<hr />\r\n<p><em>Each team and project create unique scenarios for using Libraries. If you have additional questions about your team could use Libraries in Abstract, feel free to reach out to&nbsp;</em><a href=\"https://support.goabstract.com/hc/en-us/requests/new\" target=\"_blank\"><em>Contact Us</em></a><em>&nbsp;or visit our&nbsp;</em><a href=\"https://support.goabstract.com/hc/en-us/articles/360001392672-Using-Sketch-Libraries\" target=\"_blank\"><em>Help Center</em></a><em>&nbsp;for more info.</em></p>','publish','libraries-101-is-the-basics','2018-05-09 05:01:10','post','',0),
	(9,31,'2018-05-09 06:36:47','Top UX Inspirations of all time!','<p>Last week we talked about setting up a local development server with PHP&rsquo;s built-in web server and I mentioned that we&rsquo;d delve into page routing. Routing refers to taking the URI that a person was requested, let&rsquo;s say&nbsp;<code>/about</code>&nbsp;and routing that to the appropriate code.</p>\r\n\r\n<p>Sure, you could just have a script named&nbsp;<code>about.php</code>&nbsp;and just make the&nbsp;<code>.php</code>&nbsp;part of the URI. You could take it a step further and write a rewrite rule for nginx or Apache or whatever and have that strip the&nbsp;<code>.php</code>&nbsp;so it&rsquo;s just&nbsp;<code>/about</code>. This is great, but if you are using the PHP web server you must build your routing in PHP instead.</p>\r\n\r\n<p>To get started, let&rsquo;s create a new directory called&nbsp;<code>routing</code>&nbsp;with two directories inside there,&nbsp;<code>public</code>&nbsp;and&nbsp;<code>views</code>, and change to the public directory and start our web server:</p>\r\n\r\n<pre>\r\n<code>mkdir -p router/public router/views\r\ncd router/public\r\nphp -S localhost:3000</code></pre>\r\n\r\n<p>If you point your web browser to&nbsp;<code>http://localhost:3000</code>&nbsp;you will receive a &ldquo;Not Found&rdquo; message. That will tell you it&rsquo;s working and we can get to work!</p>\r\n\r\n<p>First, let&rsquo;s create three views, one of the home page, one for the about page and a third that will be our 404 page. You&rsquo;ll need another terminal window and should be in the root of the project (the&nbsp;<code>router</code>&nbsp;directory) we created earlier. Once there, run:</p>\r\n\r\n<pre>\r\n<code>echo &#39;home is where the heart is&#39; &gt; views/home.php\r\necho &#39;this is a site about nothing&#39; &gt; views/about.php\r\necho &#39;oh noes!!~!&#39; &gt; views/404.php</code></pre>\r\n\r\n<p>Now that we have our views ready, let&rsquo;s set up our router. The router code will live in&nbsp;<code>public/index.php</code>&nbsp;and should look something like this:</p>\r\n\r\n<pre>\r\n<code>&lt;?php\r\n// Grabs the URI and breaks it apart in case we have querystring stuff\r\n$request_uri = explode(&#39;?&#39;, $_SERVER[&#39;REQUEST_URI&#39;], 2);\r\n\r\n// Route it up!\r\nswitch ($request_uri[0]) {\r\n    // Home page\r\n    case &#39;/&#39;:\r\n        require &#39;../views/home.php&#39;;\r\n        break;\r\n    // About page\r\n    case &#39;/about&#39;:\r\n        require &#39;../views/about.php&#39;;\r\n        break;\r\n    // Everything else\r\n    default:\r\n        header(&#39;HTTP/1.0 404 Not Found&#39;);\r\n        require &#39;../views/404.php&#39;;\r\n        break;\r\n}</code></pre>\r\n\r\n<p>Once you have that saved, go back to your browser and refresh it. You should see the contents of the home page. If you go to&nbsp;<code>http://localhost:3000/about</code>&nbsp;you should see the about page contents and for any other URI the 404 page (with the appropriate HTTP status code header).</p>\r\n\r\n<p>That&rsquo;s page routing in it&rsquo;s most basic form. If you want to add more pages, you can add them to the switch statement. If you would much rather have a huge monolitic file, you could even omit the&nbsp;<code>require</code>&nbsp;and inline the code right there (which I don&rsquo;t advice).</p>\r\n\r\n<p>The only caveat I have ran into with this code is that if you try to access a URI with a period on it, like&nbsp;<code>about.php</code>&nbsp;it will give you the internal PHP web server&rsquo;s &ldquo;Not Found&rdquo; message. This really shouldn&rsquo;t be an issue on a web server like nginx because you would just be routing all non-matching traffic to the PHP process manager (regardless of the period).</p>\r\n\r\n<p>Personally, I really like handling routing in PHP because it allows me to be somewhat web server agnostic. I prefer nginx but perhaps down the road something even better will pop up. When that happens, I would have to port all of my web server specific configuration over to the new server. If the logic lives in PHP I can just swap out the server and be pretty much good to go.</p>','publish','top-ux-inspirations-of-all-time','2018-05-09 05:24:42','post','',0);

/*!40000 ALTER TABLE `tb_posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_terms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_terms`;

CREATE TABLE `tb_terms` (
  `term_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table tb_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `ID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_nicename` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_url` varchar(100) NOT NULL,
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_activation_key` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL DEFAULT '0',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;

INSERT INTO `tb_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_level`, `user_status`, `display_name`)
VALUES
	(31,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin@x-lab.com','http://x-lab.com','2018-05-09 06:34:39','1525847679:d1a049b3249088fa96a0d0657cb6b06e2afc0cd8',0,1,'Admin');

/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_visitors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_visitors`;

CREATE TABLE `tb_visitors` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asal_muasal` varchar(1000) NOT NULL,
  `tujuan` varchar(1000) NOT NULL,
  `tanggal_kunjungan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `tb_visitors` WRITE;
/*!40000 ALTER TABLE `tb_visitors` DISABLE KEYS */;

INSERT INTO `tb_visitors` (`ID`, `asal_muasal`, `tujuan`, `tanggal_kunjungan`)
VALUES
	(3,'tidak diketahui','http://x-lab/x-comments-post.php','2018-05-09 06:20:07'),
	(4,'tidak diketahui','http://x-lab/blog/libraries-101-is-the-basics-8','2018-05-09 06:26:31'),
	(5,'tidak diketahui','http://x-lab/blog/libraries-101-is-the-basics-8','2018-05-09 06:26:31'),
	(6,'tidak diketahui','http://x-lab/blog/top-ux-inspirations-of-all-time-9','2018-05-09 06:30:15'),
	(7,'tidak diketahui','http://x-lab/blog/top-ux-inspirations-of-all-time-9','2018-05-09 06:30:15'),
	(8,'tidak diketahui','http://x-lab/blog/top-ux-inspirations-of-all-time-9','2018-05-09 06:30:20'),
	(9,'tidak diketahui','http://x-lab/blog/top-ux-inspirations-of-all-time-9','2018-05-09 06:30:20');

/*!40000 ALTER TABLE `tb_visitors` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
