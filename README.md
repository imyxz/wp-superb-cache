# wp-superb-cache
A simple but ultra fast wordpress cache plugin.</br>
In most case, what make your site slow is that compile wordpress require a lot of time. So I have the idea to make this small plugin.</br>
Unlike other cache plugin, wp superb cache do not run as a "plugin" in wordpress. It is independent from wordpress. Wp superb cache will work before wordpress is loaded .  Obviously , wp superb cache will be much faster than other plugin which have to load wordpress before it can work.
</br>
<b>How to</b></br>
It is easy to install wp superb cache. </br>
1. Go to your wordpress root dir and rename the original "index.php" to "index1.php".</br>
2. Create a dir named cache_html and give permission to write&read files.</br>
3. Save wp superb cache as "index.php" in the wordpress root dir.</br>
Now , wp superb cache is installed.</br>
<b>Notice</b>: if you install wordpress update, index.php will be overwrite. So you have to install wp superb cache again.</br>
