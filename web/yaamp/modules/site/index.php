<?php

$algo = user()->getState('yaamp-algo');

JavascriptFile("/extensions/jqplot/jquery.jqplot.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.dateAxisRenderer.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.barRenderer.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.highlighter.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.cursor.js");
JavascriptFile('/yaamp/ui/js/auto_refresh.js');

$height = '240px';

$min_payout = floatval(YAAMP_PAYMENTS_MINI);
$min_sunday = $min_payout/10;

$payout_freq = (YAAMP_PAYMENTS_FREQ / 3600)." hours";
?>

<div id='resume_update_button' style='color: #000; background-color: #EFD20A; border: 1px solid #F0C20A;
	padding: 10px; margin-left: 20px; margin-right: 20px; margin-top: 15px; cursor: pointer; display: none;'
	onclick='auto_page_resume();' align=center>
	<b>Auto refresh is paused - Click to resume</b></div>

<table cellspacing=20 width=100%>
<tr><td valign=top width=50%>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">NoteBC Official Pool</div>
<div class="main-left-inner">

<img src="/images/pool-logo.png" alt="NoteBC Pool" class="logo-wrap"/>

<ul>

<li>Welcome to the NOTEBC Official Mining Pool.</li>
<li>&nbsp;</li>
<li>No registration is required, we do payouts in NTBC. Use your wallet address as the username.</li>
<li>&nbsp;</li>
<li>Payouts are made automatically every 2 hours. From Mon-Sat, if your balance is above <b>100</b>, your wallet address will be chosen for payout. On Sundays, you only need a pending balance of <b>10</b> NOTEs to be selected for payouts.</li>
<li>&nbsp;</li>
<li>For some cases, there is an initial delay before the first payout, please wait at least 6 hours before asking for support. The top right corner indicates the next payout time (in UTC)</li>
<li>&nbsp;</li>
<li>Blocks are distributed proportionally among valid submitted shares. Considering that there are ASICs mining to the pool, CPU or GPU mining is not advised.</li>

<br/>

</ul>
</div></div>
<br/>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">STRATUM SERVERS</div>
<div class="main-left-inner">

<ul>

<li>
<p>Generic Stratum details for the pool</p>
<p class="main-left-box" style='padding: 3px; font-size: .8em; background-color: #000; color: #F0DF0B; font-family: "Fira Code", monospace;'>
	-o stratum+tcp://mining.notebc.space:3433 -u &lt;WALLET_ADDRESS&gt; -p c=NOTE</p>
</li>

<li>
<p><strong>Supported Miners</strong><em>(with sample configuration)</em></p>
</li>

<li>
<p>CGMiner v4.9.0 - ASICs</p>
<p class="main-left-box" style='padding: 3px; font-size: .8em; background-color: #000; color: #F0DF0B; font-family: "Fira Code", monospace;'>
 cgminer -a scrypt -o stratum+tcp://mining.notebc.space:3433 -u ADDRESS -p c=NOTE
</p>
</li>

<li>
<p>BFGMiner v5.4.2 - FutureBit Moonlander 2</p>

<p> NoteBC is proud to support low wattage mining initiatives. You can use Moonlander (ML2) or Apollo from FutureBit. Alternative to the ML2
is the TTBit Scrypt miner.</p>
<p class="main-left-box" style='padding: 3px; font-size: .8em; background-color: #000; color: #F0DF0B; font-family: "Fira Code", monospace;'>
bfgminer --scrypt -o stratum+tcp://mining.notebc.space:3433 -u ADDRESS -p password -S MLD:all --set MLD:clock=600
</p>
</li>


<?php if (YAAMP_ALLOW_EXCHANGE): ?>
<li>&lt;WALLET_ADDRESS&gt; can be one of any currency we mine or a BTC address.</li>
<?php else: ?>
<li>&lt;WALLET_ADDRESS&gt; should be valid for the currency you mine. <b>DO NOT USE a BTC address here, the auto exchange is disabled</b>!</li>
<?php endif; ?>
<li>As optional password, you can use <b>-p c=&lt;SYMBOL&gt;</b> if yiimp does not set the currency correctly on the Wallet page.</li>
<li>See the "Pool Status" area on the right for PORT numbers. Algorithms without associated coins are disabled.</li>

<br>

</ul>
</div></div><br>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">LINKS</div>
<div class="main-left-inner">

<ul>

<!--<li><b>BitcoinTalk</b> - <a href='https://bitcointalk.org/index.php?topic=508786.0' target=_blank >https://bitcointalk.org/index.php?topic=508786.0</a></li>-->
<!--<li><b>IRC</b> - <a href='http://webchat.freenode.net/?channels=#yiimp' target=_blank >http://webchat.freenode.net/?channels=#yiimp</a></li>-->

<li><b>API</b> - <a href='/site/api'>http://<?= YAAMP_SITE_URL ?>/site/api</a></li>
<li><b>Difficulty</b> - <a href='/site/diff'>http://<?= YAAMP_SITE_URL ?>/site/diff</a></li>
<?php if (YIIMP_PUBLIC_BENCHMARK): ?>
<li><b>Benchmarks</b> - <a href='/site/benchmarks'>http://<?= YAAMP_SITE_URL ?>/site/benchmarks</a></li>
<?php endif; ?>

<?php if (YAAMP_ALLOW_EXCHANGE): ?>
<li><b>Algo Switching</b> - <a href='/site/multialgo'>http://<?= YAAMP_SITE_URL ?>/site/multialgo</a></li>
<?php endif; ?>

<br>

</ul>
</div></div><br>

<!--  -->

<a class="twitter-timeline" href="https://twitter.com/BlockchainNote?ref_src=twsrc%5Etfw">Tweets by BlockchainNote</a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

</td><td valign=top>

<!--  -->

<div id='pool_current_results'>
<br><br><br><br><br><br><br><br><br><br>
</div>

<div id='pool_history_results'>
<br><br><br><br><br><br><br><br><br><br>
</div>

</td></tr></table>

<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>

<script>

function page_refresh()
{
	pool_current_refresh();
	pool_history_refresh();
}

function select_algo(algo)
{
	window.location.href = '/site/algo?algo='+algo+'&r=/';
}

////////////////////////////////////////////////////

function pool_current_ready(data)
{
	$('#pool_current_results').html(data);
}

function pool_current_refresh()
{
	var url = "/site/current_results";
	$.get(url, '', pool_current_ready);
}

////////////////////////////////////////////////////

function pool_history_ready(data)
{
	$('#pool_history_results').html(data);
}

function pool_history_refresh()
{
	var url = "/site/history_results";
	$.get(url, '', pool_history_ready);
}

</script>

