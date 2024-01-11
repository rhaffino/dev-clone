<?php
return [
    "meta-title" => "Robots.txt Generator for SEO - Custom and Check robots.txt File in Free",
    "meta-desc" => "Use robots.txt generator to set the index status of the link on your website. Helps Google optimize dan improve your web performance.",
    "title" => "ROBOTS.TXT GENERATOR",
    "subtitle" => "Generate robots.txt file easily",
    "label-robot-access" => "Default robot access",
    "placeholder-robot-access" => "Select Access",
    "robot-access-opt-1" => "Allow",
    "robot-access-opt-2" => "Disallow",
    "label-crawl-delay" => "Crawl delay",
    "placeholder-crawl-delay" => "Select delay",
    "crawl-delay-opt-1" => "No Delay",
    "crawl-delay-opt-2" => "5 seconds",
    "crawl-delay-opt-3" => "10 seconds",
    "crawl-delay-opt-4" => "20 seconds",
    "crawl-delay-opt-5" => "60 seconds",
    "crawl-delay-opt-6" => "120 seconds",
    "label-sitemap" => "Sitemap",
    "label-sitemap-helper" => "(leave blank if you don’t have)",
    "label-directive" => "Directive",
    "btn-add" => "ADD DIRECTIVE",
    "highlight" => "In this latest version, we develop the Robot TXT Generator tool with export features and useragent features. The export feature will make it easier for you to check the code on Google Rich Result. Meanwhile, the useragent feature will allow you to add more commands to the Robot TXT Generator. This makes it easier for the txt Robot to specifically sort out which content you want to cover and which ones are displayed.",
    "desc-1" => "What is Robots.txt Generator?",
    "desc-1-1" => "Robots.txt generator is a tool that is able to make it easier for you to make configurations in the robots.txt file. The robots.txt generator from cmlabs contains all the commands you can use to create a robots.txt file, from specifying a user-agent, entering a sitemap path, specifying access permissions (allow or disallow), to setting crawl-delay.",
    "desc-2" => "Why Do You Need a Robots.txt Generator?",
    "desc-2-1" => "By using the <a href='https://tools.cmlabs.co/id/robotstxt-generator'>robots.txt generator</a>, you do not need to manually write the robots.txt file. Just enter the command you want to give the web crawler, then set which pages are allowed or not allowed to be crawled. How to use the robots.txt generator is quite easy, with just a few clicks.",
    "desc-3" => "Robots.txt Functions For Your Website",
    "desc-3-1" => "Robots.txt is a file containing certain commands that decide whether the user-agent (web crawler of each search engine) is allowed or not to crawl website elements. The functions of robots.txt for your website are as follows:",
    "desc-3-1-1" => "Tells crawlers which page URLs they can or can't access",
    "desc-3-1-2" => "Helping websites avoid the burden of too many crawl requests",
    "desc-3-1-3" => "Help manage crawler traffic to your website",
    "desc-4" => "Robots.txt File Location In Website",
    "desc-4-1" => "Generally, the location of the robots.txt file is in the main directory of the website (e.g domain root or homepage). Before you add it, the robots.txt file is already in the root folder on the file storage server (public_html).",
    "desc-4-2" => "However, you will not find the file when you open public_html. This is because this file is virtual and cannot be modified or accessed from other directories. To change commands in robots.txt, you need to add a new robots.txt file and save it in the public_html folder. In this way, the configuration in the new file will replace the previous file.",
    "desc-5" => "Syntax on Robots.txt",
    "desc-5-1" => "The robots.txt syntax can be interpreted as the command you use to notify web crawlers. The robots.txt generator from cmlabs also provides a syntax that the web crawler recognizes. The five terms commonly found in a robots.txt file are as follows:",
    "desc-5-1-1" => "User-Agent",
    "desc-5-1-2" => "What is meant by a user-agent in robots.txt is the specific type of web crawler that you give the command to crawl. This web crawler usually varies depending on the search engine used.",
    "desc-5-1-3" => "Some examples of user agents that are often used are Googlebot, Googlebot-Mobile, Googlebot-Image, Bingbot, Baiduspider, Gigabot, Yandex, and so on.",
    "desc-5-2-1" => "Disallow",
    "desc-5-2-2" => "The command used to tell the user-agent not to crawl the specified URL path. Make sure you have entered the correct path because this command is case-sensitive (eg “/File” and “/file” are considered different paths). You can only use one “Disallow” command for each URL.",
    "desc-5-3-1" => "Allow",
    "desc-5-3-2" => "This command is used to tell web crawlers that they are allowed to access the path of a page or subfolder even if the parent page of that page or subfolder is disallowed.In practice, the allow and disallow commands are always followed by the “directive: [path]” command to specify the path that may or may not be crawled. Careful attention must be paid to writing the path because this command distinguishes between upper/lower case letters (eg “/File” and “/file” are considered as different paths).",
    "desc-5-4-1" => "Crawl-Delay",
    "desc-5-4-2" => "The function of this command in robots.txt is to tell web crawlers that they should wait a while before loading and crawling the page content. This command does not apply to Googlebot, but you can adjust the crawl speed via Google Search Console.",
    "desc-5-5-1" => "Sitemap",
    "desc-5-5-2" => "This command is used to call the XML sitemap location associated with a URL. It is also important to pay attention to the writing of the sitemap command because this command distinguishes upper / lower case letters (eg &#34;/Sitemap.xml&#34; and &#34;/sitemap.xml&#34; are considered different paths).",
    "desc-6" => "Example Robots.txt",
    "desc-6-1" => "After understanding the commands you can give the web crawler, we will next show an example of the www.example.com website's robots.txt, which is stored in the following www.example.com/robots.txt directory:",
    "desc-6-2" => "The first and second lines are commands that tell the default web crawler that they are allowed to crawl URLs. Meanwhile, the third line is used to call the sitemap location associated with that URL.",
    "desc-6-3" => "The fourth and fifth lines are the commands given to Google's web crawler. This command does not allow Googlebot to crawl your website directory (forbids Google from crawling the “/nogooglebot” file path).",
    "desc-7" => "The Limitation of Robots.txt",
    "desc-7-1" => "Before creating a robots.txt, you need to know the limitations that the following robots.txt file has:s",
    "desc-7-1-1" => "May not be supported on certain search engines",
    "desc-7-1-2" => "While Google and other major search engines have complied with the commands in the robots.txt file, some crawlers belonging to other search engines may not comply.",
    "desc-7-2-1" => "Different crawlers interpret the syntax in different ways",
    "desc-7-2-2" => "Each search engine has a different web crawler, each crawler may interpret commands in different ways. Although a number of well-known crawlers have followed the syntax written in the robots.txt file, some crawlers may not understand certain commands.",
    "desc-7-3-1" => "Pages that are not allowed on robots.txt can still be indexed if they are linked to other pages",
    "desc-7-3-2" => "While Google doesn't crawl or index content that robots.txt doesn't allow, Google can still find and index those URLs if they're linked from other websites. Thus, URL addresses and publicly available information can appear in Google search results.",
    "desc-7-3-3" => "Thus the discussion about the <a href='https://tools.cmlabs.co/id/robotstxt-generator'>robots.txt generator from cmlabs</a>. Using this tool, you can simplify the workflow of creating robots.txt files. With just a few clicks, you can add configurations to the new robots.txt file.",
    "howto-title" => 'How to Use Robots.txt Generator',
    "howto1" => '<h2>How to Use Robots.txt Generator</h2>
                    <p>To create a robots.txt file using this tool, follow these steps:</p>',
    "howto2" => '<h4 class="sub-titles">Go to Robots.txt Generator Page</h4>
                    <p>One way to create a robots.txt file is to visit the robots.txt generator page. On that page, you can set the commands you will give the web crawler.</p>',
    "howto3" => '<p>Figure 1: The robots.txt generator page view from cmlabs</p>
                    <h4 class="sub-titles">Select Access Permission For Default Robot</h4>
                    <p>Specify access permissions for the default web crawlers, whether they are allowed to crawl URLs or not. There are two options that you can choose, namely, allow and disallow.</p>',
    "howto4" => '<p>Figure 2: Dropdown view of the permission options granted to the default robot</p>
                    <h4 class="sub-titles">Set Crawl Delay</h4>
                    <p>You can set how long the crawl delay will be for the web crawler. If you set crawl-delay then the web crawler will wait for some time before crawling your URL. Robots.txt generator allows you to choose without crawl delay or delay for 5 to 120 seconds.</p>',
    "howto5" => '<p>Figure 3: A dropdown view of the crawl delay options provided to the default robot</p>
                    <h4 class="sub-titles">Enter Sitemap (If Any)</h4>
                    <p>A sitemap is a file that lists the URLs of your website, with this file, web crawlers will find it easier to crawl and index your site. You can enter the sitemap path into the field provided.</p>
                    <p>Make sure you have entered the correct sitemap path because this command is case sensitive (eg “/Sitemap.xml” and “/sitemap.xml” are considered different paths).</p>',
    "howto6" => '<p>Figure 4: The display field for entering the sitemap path associated with your URL</p>
                    <h4 class="sub-titles">Add Directive In Robots.txt</h4>
                    <p>You can add directives to the robots.txt file by pressing the <b>&#34;Add Directive&#34;</b> button. Directives are commands given to web crawlers to tell you whether you allow or deny them to crawl certain URLs.</p>',
    "howto7" => '<p>Figure 5: Button for adding commands to be executed by the web crawler</p>
                    <p>In the robots.txt generator, there are three rules that you need to adjust in the directive section, namely:</p>
                    <h6 class="sub-titles">Set Access Permission</h6>
                    <p>You can set the access permissions granted to web crawlers, whether you allow or disallow them from crawling your web pages. The options that can be used allow and disallow.</p>',
    "howto8" => '<p>Figure 6: Choice of access permissions to be granted to web crawlers</p>
                    <h6 class="sub-titles">Select User-Agent</h6>
                    <p>A user-agent is the type of web crawler that you will instruct to crawl. The choice of this web crawler depends on the search engine used, such as Baiduspider, Bingbot, Googlebot, and others. The web crawler option can be selected via the available user-agent dropdown.</p>',
    "howto9" => '<p>Figure 7: User-agent options available in cmlabs robots.txt generator</p>
                    <h6 class="sub-titles">Enter Directory / File Path</h6>
                    <p>A directory or file path is a specific location of a page that web crawlers may or may not crawl. You must pay close attention to writing the path because this command distinguishes between upper and lower case letters (eg "/File" and "/file" are considered different paths).</p>',
    "howto10" => '<p>Figure 8: Field to add the path to be crawled by the crawler</p>
                    <h4 class="sub-titles">Copy Robots.txt</h4>
                    <p>After entering the command for the web crawler in the field provided, you will see a preview of the robots.txt file in the right section. You can copy the generated syntax and paste it into the robots.txt file that you have created.</p>',
    "howto11" => '<p>Figure 9: Syntax copy options in the robots.txt generator.</p>
                    <h4 class="sub-titles">Export Syntax Robots.txt</h4>
                    <p>If you don&#39;t know how to create your own robots.txt file, you can export the file that cmlabs has generated. Downloading the robots file is quite easy. You can select the <b>&#34;Export&#34;</b> option contained in the robots.text generator tools. Next, the tool will start the download and you will receive a robots.txt file.</p>',
    "howto12" => '<p>Figure 10: Data export options in the robots.txt generator.</p>
                    <h4 class="sub-titles">Remove Unnecessary Directives</h4>
                    <p>If you want to delete unneeded directives, then you can click the cross icon to the right of the field to enter the directive. Please note that deleted fields cannot be recovered.</p>',
    "howto13" => '<p>Figure 11: The delete data directive option in the robots.txt generator</p>
                    <h4 class="sub-titles">Reset Robots.txt Generator</h4>
                    <p>This tool has options that make it easier for you to find out how to create another robots.txt file. Click the <b>&#34;Reset&#34;</b> option to delete all the commands you set in robots.txt earlier. Next, you can create a new robots.txt configuration file.</p>',
    "howto14" => '<p>Figure 12: Data reset options in the robots.txt generator.</p>',
    "whats-new-1" => "In this latest version, cmlabs added the export feature in the Robot TXT Generator tool. This feature is useful for users to directly check the code on Google Rich Result. The process of crawling websites and reviewing all content is now faster and more precise. You can learn more about this feature by trying it in person.",
    "whats-new-2" => "In this latest version update, cmlabs added more useragent features. This feature allows more commands that the TXT Generator Robot can receive. So, Robots.txt is more specific in sorting out which content you want to cover and which ones you want to display. Better update for better work.",
];
