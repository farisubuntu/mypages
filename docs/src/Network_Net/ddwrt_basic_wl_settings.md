<div id="content">
        <a name="top" id="top"></a>
                <h1 class="firstHeading">Basic Wireless Settings</h1>
        <div id="bodyContent" class="gumax-bodyContent">
            <h3 id="siteSub">From DD-WRT Wiki</h3>
<table id="toc" class="toc" summary="Contents"><tbody><tr><td><div id="toctitle"><h2>Contents</h2> <span class="toctoggle">[<a id="togglelink" class="internal" href="javascript:toggleToc()">hide</a>]</span></div>
<ul>
<li class="toclevel-1"><a href="#Basic_Wireless_Settings"><span class="tocnumber">1</span> <span class="toctext">Basic Wireless Settings</span></a>
<ul>
<li class="toclevel-2"><a href="#Introduction"><span class="tocnumber">1.1</span> <span class="toctext">Introduction</span></a></li>
<li class="toclevel-2"><a href="#Regulatory_Domain"><span class="tocnumber">1.2</span> <span class="toctext">Regulatory Domain</span></a></li>
<li class="toclevel-2"><a href="#Regulatory_Mode"><span class="tocnumber">1.3</span> <span class="toctext">Regulatory Mode</span></a></li>
<li class="toclevel-2"><a href="#TPC_Mitigation_Factor"><span class="tocnumber">1.4</span> <span class="toctext">TPC Mitigation Factor</span></a></li>
<li class="toclevel-2"><a href="#Wireless_Physical_Interface"><span class="tocnumber">1.5</span> <span class="toctext">Wireless Physical Interface</span></a></li>
<li class="toclevel-2"><a href="#Wireless_Mode"><span class="tocnumber">1.6</span> <span class="toctext">Wireless Mode</span></a></li>
<li class="toclevel-2"><a href="#Wireless_Network_Mode"><span class="tocnumber">1.7</span> <span class="toctext">Wireless Network Mode</span></a></li>
<li class="toclevel-2"><a href="#Wireless_Channel"><span class="tocnumber">1.8</span> <span class="toctext">Wireless Channel</span></a></li>
<li class="toclevel-2"><a href="#Channel_Width"><span class="tocnumber">1.9</span> <span class="toctext">Channel Width</span></a></li>
<li class="toclevel-2"><a href="#Sensitivity_Range_.28ACK_Timing.29"><span class="tocnumber">1.10</span> <span class="toctext">Sensitivity Range (ACK Timing)</span></a></li>
<li class="toclevel-2"><a href="#Wireless_Network_Name_.28SSID.29"><span class="tocnumber">1.11</span> <span class="toctext">Wireless Network Name (SSID)</span></a></li>
<li class="toclevel-2"><a href="#Wireless_SSID_Broadcast"><span class="tocnumber">1.12</span> <span class="toctext">Wireless SSID Broadcast</span></a></li>
<li class="toclevel-2"><a href="#Network_Configuration"><span class="tocnumber">1.13</span> <span class="toctext">Network Configuration</span></a></li>
<li class="toclevel-2"><a href="#Wireless_Security"><span class="tocnumber">1.14</span> <span class="toctext">Wireless Security</span></a>
<ul>
<li class="toclevel-3"><a href="#Security_Mode"><span class="tocnumber">1.14.1</span> <span class="toctext">Security Mode</span></a></li>
<li class="toclevel-3"><a href="#WPA_Algorithms"><span class="tocnumber">1.14.2</span> <span class="toctext">WPA Algorithms</span></a></li>
<li class="toclevel-3"><a href="#WPA_Shared_Key"><span class="tocnumber">1.14.3</span> <span class="toctext">WPA Shared Key</span></a></li>
<li class="toclevel-3"><a href="#Key_Renewal_Interval"><span class="tocnumber">1.14.4</span> <span class="toctext">Key Renewal Interval</span></a></li>
</ul>
</li>
</ul>
</li>
</ul>
</td></tr></tbody></table><script type="text/javascript"> if (window.showTocToggle) { var tocShowText = "show"; var tocHideText = "hide"; showTocToggle(); } </script>
<a name="Basic_Wireless_Settings"></a><h1><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=1" title="Edit section: Basic Wireless Settings">edit</a>]</span> <span class="mw-headline"> Basic Wireless Settings </span></h1>
<a name="Introduction"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=2" title="Edit section: Introduction">edit</a>]</span> <span class="mw-headline"> Introduction </span></h2>
<p>Note, if you do not see a certain setting on your router, it may be on a different screen or it is not supported. If in doubt, ask on the forums.
</p><p>See: <a href="/wiki/index.php/Advanced_wireless_settings" title="Advanced wireless settings">Advanced Wireless Settings</a> for the rest of the settings not found on this page.
</p>
<a name="Regulatory_Domain"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=3" title="Edit section: Regulatory Domain">edit</a>]</span> <span class="mw-headline"> Regulatory Domain </span></h2>
<p><b>Available Settings:</b> 115+ different countries (several countries share the same regulations) 
</p><p><b>Default Setting:</b> Germany 
</p><p>This determines the channels available in the list for both bands (if you have a dual band router) and the maximum <a href="http://en.wikipedia.org/wiki/Equivalent_isotropically_radiated_power" class="external text" title="http://en.wikipedia.org/wiki/Equivalent_isotropically_radiated_power" rel="nofollow">EIRP</a> "legally" allowed by the telecom authorities in the chosen country. EIRP is TX power plus antenna gain, example: * 20 dBm TX power with a 10 dBi gain antenna has an EIRP of 30 dBm. 
</p>
<ul><li> 24 dBm TX power with a 6 dBi gain antenna has an EIRP of 30 dBm. 
</li></ul>
<p><br>
</p><p>Maximum EIRP varies by nation and your max TX power will be capped by the regulatory domain if you have a powerful radio. For example, Canada's max allowed EIRP is 36 dBm while its max allowed TX power is 30 dBm, with Canada selected and antenna gain at 0 dBi, the radios will never go above 30 dBm assuming they are capable of reaching that of course. 
</p>
<a name="Regulatory_Mode"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=4" title="Edit section: Regulatory Mode">edit</a>]</span> <span class="mw-headline"> Regulatory Mode </span></h2>
<p><b>Available Settings:</b> Off, 802.11h Loose, 802.11h Strict, 802.11d
</p><p><b>Default Setting:</b> Off
</p><p><b>Recommended Setting:</b> Off
</p><p>Here's some information on what 80211h was supposed to do:<i>IEEE 802.11h is the IEEE standard for Spectrum and Transmit Power Management Extensions. It solves problems like interference with satellites and radar using the same 5 GHz frequency band. It was originally designed to address European regulations but is now applicable in many other countries. The standard provides Dynamic Frequency Selection (DFS) and transmit Power Control (TPC) to the IEEE 802.11a MAC.</i>
</p>
<a name="TPC_Mitigation_Factor"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=5" title="Edit section: TPC Mitigation Factor">edit</a>]</span> <span class="mw-headline"> TPC Mitigation Factor </span></h2>
<p><b>Available Settings:</b> 0 (Off), 1, 2, 3, 4
</p><p><b>Default Setting:</b> Off
</p><p><b>Recommended Setting:</b> Off
</p><p>Here is what it changes: <a href="https://www.cisco.com/c/en/us/td/docs/wireless/controller/technotes/8-3/b_RRM_White_Paper/b_RRM_White_Paper_chapter_0101.html" class="external free" title="https://www.cisco.com/c/en/us/td/docs/wireless/controller/technotes/8-3/b_RRM_White_Paper/b_RRM_White_Paper_chapter_0101.html" rel="nofollow">https://www.cisco.com/c/en/us/td/docs/wireless/controller/technotes/8-3/b_RRM_White_Paper/b_RRM_White_Paper_chapter_0101.html</a> 
</p>
<a name="Wireless_Physical_Interface"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=6" title="Edit section: Wireless Physical Interface">edit</a>]</span> <span class="mw-headline"> Wireless Physical Interface </span></h2>
<p><b>Available Interfaces:</b> athX (0, 1, 2 etc, varies by router as many routers have 2 or more radios in them) 
</p><p>If you have a dual band router ath1 will be displayed below ath0 with the same available settings. Ath0 is the 2.4GHz radio and ath1 is the 5GHz radio for most routers, for some like the TL-WDR4900 v1.3, ath0 is 5GHz &amp; ath1 is 2.4GHz; its just the way the radios are connected on the PCB &amp; is normal. If you create a VAP for 2.4GHz or 5GHz radio the VAPs will be labelled athX.1 &amp; athX.1 respectively where X = the interface's number. For example, a VAP made on ath0 will be ath0.1, then ath0.2, etc. Refer to <a href="http://www.dd-wrt.com/phpBB2/viewtopic.php?t=47708" class="external text" title="http://www.dd-wrt.com/phpBB2/viewtopic.php?t=47708" rel="nofollow">this thread</a> for some info about VAPs with Qualcomm Atheros. 
</p><p><br>
</p>
<a name="Wireless_Mode"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=7" title="Edit section: Wireless Mode">edit</a>]</span> <span class="mw-headline"> Wireless Mode  </span></h2>
<p><b>Atheros available Settings:</b> AP, Client, Client Bridge, Adhoc, WDS Station, WDS AP<b>Broadcom available Settings:</b> AP, Client, Client Bridge, Adhoc, Repeater, Repeater Bridge<b>Default Setting</b> AP<b>Recommended Setting:</b> AP for most users, other options if you are advanced and know you need it 
</p><p><b>The help file says...</b> * The wireless part of your router can run in different modes: 
</p>
<ul><li> AP mode â€“ This is the default mode, also called Infrastructure mode. Your router acts as an central connection point, to which wireless clients can connect. 
</li><li> Client mode â€“ The radio interface is used to connect the internet-facing side of the router (i.e., the WAN) as a client to a remote access point. NAT or routing are performed between WAN and LAN, like in "normal" gateway or router mode. Use this mode, e.g., if your internet connection is provided by a remote access point, and you want to connect a subnet of your own to it. 
</li><li> Client Bridged mode â€“ The radio interface is used to connect the LAN side of the router to a remote access point. The LAN and the remote AP will be in the same subnet (This is called a "bridge" between two network segments). The WAN side of the router is unused and can be disabled. Use this mode, e.g., to make the router act as a "WLAN adapter" for a device connected to one of its LAN Ethernet ports. 
</li><li> Ad-Hoc mode â€“ This is for peer to peer wireless connections. Clients running in Ad-Hoc mode can connect to each other as required without involving central access points. 
</li><li> See this page for more info on linking routers: <a href="https://www.dd-wrt.com/wiki/index.php/Linking_Routers" class="external free" title="https://www.dd-wrt.com/wiki/index.php/Linking_Routers" rel="nofollow">https://www.dd-wrt.com/wiki/index.php/Linking_Routers</a>
</li></ul>
<p><br>
</p><p><b>How it works:</b>Determines how the specific wireless interface of the router is to behave. If you want to run a normal access point which most do, AP would be your choice. Client and Client Bridge with Virtual Interfaces is the Atheros equivalent Broadcom's Repeater and Repeater Bridge settings. 
</p><p><br>
</p>
<a name="Wireless_Network_Mode"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=8" title="Edit section: Wireless Network Mode">edit</a>]</span> <span class="mw-headline"> Wireless Network Mode  </span></h2>
<p><b>Available Settings (2.4 GHz):</b> Disabled, Mixed, B-Only, G-Only, BG-Mixed, NG-Mixed, N-Only (2.4 GHz) 
</p><p><b>Available Settings (5 GHz):</b> Disabled, Mixed, A-Only, NA-Mixed, AC/N-Mixed, N-Only (5 GHz), AC-Only 
</p><p><b>Available Settings (60 GHz):</b> Disabled, Mixed, AD-Only 
</p><p><b>Default Setting:</b> Mixed 
</p><p><b>Recommended Setting:</b> NG-Mixed (2.4 GHz), AC/N-Mixed (5 GHz), AD-Only (60 GHz) 
</p><p>Controls which 802.11 signals are being broadcast by the radio. Depending on the selected network mode your wireless channel list and maximum TX power can vary. NG-Mixed for 2.4 GHz &amp; Mixed or AC/N-Mixed is the recommended setting for most people as your clients' NICs are able to use either (V)HT20, (V)HT40, &amp; VHT80 "properly" with this setting. If you have any issues or do not use 802.11b clients, switch to NG-Mixed. N-Only is broken on many units for some time (both bands) &amp; still is, try to avoid using as there is minimal performance change from NG-Mixed -&gt; N-Only if all you use is 802.11n clients for either of them. For 802.11a/n 5 GHz radios, Mixed &amp; NA-Mixed are the same. 
</p><p>Note on BCM routers, client / client bridged modes only should use straight mixed mode.
</p><p><br>
<b>The help file says...</b> * If you wish to exclude Wireless-G clients, choose B-Only mode. If you would like to disable wireless access, choose Disable.
</p><p><br>
</p><p>Note&nbsp;: when changing wireless mode, some advanced parameters are susceptible to be modified ("Afterburner", "Basic Rate" or "Frame Burst"). 
</p><p><b>How it works:</b> 
</p><p>In Mixed mode, dd-wrt routers are able to offer various wifi network types (B, G and N) at the same time from a single 2.4GHz radio. 802.11n transmission is always embedded in an 802.11a, for 5GHz radios, or 802.11g for 2.4GHz radio transmissions. This is called Mixed Mode Format protection (also known as L-SIG TXOP Protection). 
</p><p><b>See also:</b> 
</p>
<ul><li> <a href="/wiki/index.php/Wireless-N_Configuration" title="Wireless-N Configuration">Wireless-N Configuration</a> - not required if recommended settings are used from this page.
</li><li> <a href="/wiki/index.php/Wireless-N_Throughput_Testing" title="Wireless-N Throughput Testing">Wireless-N Throughput Testing</a>
</li></ul>
<a name="Wireless_Channel"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=9" title="Edit section: Wireless Channel">edit</a>]</span> <span class="mw-headline"> Wireless Channel  </span></h2>
<p><b>Available Settings (2.4 GHz):</b> Channels 1 ~ 14 depending on your regulatory domain &amp; channel width 
</p><p><b>Available Settings (5 GHz):</b> Channels 34 ~ 48 (U-NII-1), 52 ~ 64 (U-NII-2), 100 ~ 144 (U-NII-2e), 149 ~ 161 (U-NII-3), 165 (ISM) depending on your regulatory domain* 
</p><p><b>Available Settings (60 GHz):</b> Channels 1 ~ 4 depending on your regulatory domain* 
</p><p><b>Default Setting:</b> Auto 
</p><p><b>Recommended Setting:</b> Please actually pick a channel and try to use the cleanest channel with the least noise, most stable throughput, &amp; lowest latency jitter. Using Channels 1, 6, or 11 assures no overlap with the adjacent channels. Using other channels will work, but may overlap with neighboring wifi which will likely be using one of the three channels above. 
</p><p><b>The help file says...</b> * Select the appropriate channel from the list provided to correspond with your network settings (in North America between channel 1 and 11, in Europe 1 and 13, in Japan all 14 channels). All devices in your wireless network must use the same channel in order to function correctly. Try to avoid conflicts with other wireless networks by choosing a channel where the upper and lower three channels are not in use. 
</p><p><br>
</p><p><b>How it works:</b> 
</p><p>IEEE 802.11 is a set of standards that are published for the purposes of carrying out wireless local area network (WLAN) computer communication in the 2.4, 3.6 and 5 GHz frequency bands. They are implemented by the IEEE LAN/MAN Standards Committee ( aka "IEEE 802"). 
</p><p>2.4GHz Channels 
</p><p>2.4GHz band in the 802.11 standard uses radio frequencies in the range of 2.412-2.484 GHz. 802.11 splits up the frequencies within the band into 14 radio channels, numbered 1-14. These are the 14 channels designated in the 2.4 GHz range spaced 5 MHz apart (with the exception of a 12 MHz spacing before Channel 14). The frequency range of a channel partially overlaps with the next one, so not all the channels are therefore independent. By default on a 2.4GHz band radio DD-WRT routers, channels 1, 6 and 11 have no overlap with each other; those three channels are known in the wireless community as the "standard" for wireless channel independence within the 2.4GHz band. 
</p><p>In North America this 2.4GHz "band" is implemented by dividing the 2.4GHz band into 13 channels each with a width of 22 MHz but also spaced only 5 MHz apart, with channel 1 centred on 2412 MHz and 13 on 2472, to which Japan adds a 14th channel 12 MHz above channel 13. 
</p><p>5GHz Channels 
</p><p>5GHz band in the 802.11 standard uses radio frequencies in the range of 4.980 GHz to 5.825 GHz. 802.11 splits up the frequencies within the band into 42 wireless radio channels, numbered 7 to 196. These are the 42 channels designated in the 5 GHz range and they are spaced 5 MHz apart. The frequency range of a channel partially overlaps with the next one, so not all the channels are therefore independent but unlike the 2.4GHz band the 5GHz band offers many more non overlapping channels. 
</p><p>In North America this 5GHz "band" is implemented by dividing the 5GHz band into 24 channels (36 to 165) each with a width of 22 MHz but also spaced only 5 MHz apart, with channel 36 centred on 5.180 GHz and 165 on 5.825 GHz. 
</p><p>NOTE - The specifics of the frequency range and how channels are allocated is regulated by each country. Usually constrained in part by how each country allocates radio spectrum to various services. For example, in the 2.4Ghz band Japan has implemented 1 to 14 wireless channels, Europe #1-#13 and the FCC in the US decided with 1 to 11 wireless channels all within the same band. DD-WRT allows the use of all channels; this doesn't mean your client wireless adapter can support channels outside of its licensed region. 
</p><p>How it works in DD-WRT: To configure your radio channels in the WebGUI you browse to the "Basic Settings" under the "Wireless" page on your DD-WRT router. 
</p><p>If you have dual band router (ie. Two Radios inside the router) you will see two sections for configurations listed in this page with the headings as "wl0" for the 2.4GHz radio and "wl1" for the 5GHz radio. 
</p><p>DD-WRT has channel configuration settings that must be configured; 
</p><p>Wireless mode, this determines if the router will be used as an Access Point, Repeater, Client or in an Ad-hoc configuration mode. Channel options are only avalaible to a router running in AP or Ad-Hoc wireless mode. 
</p><p>Wireless Network mode, this setting determines what wireless protocols will be offered to the wireless clients that try to connect to the router. Depending on the wireless network mode your radio is configured for DD-WRT will have additional channel options for you to configure if you choose. 
</p><p><br>
</p>
<ul><li> If you want to introduce channel bonding in your wireless enviroment you should also start with "CTS Protection" set to Auto as well.
</li></ul>
<a name="Channel_Width"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=10" title="Edit section: Channel Width">edit</a>]</span> <span class="mw-headline"> Channel Width </span></h2>
<p>This determines the wireless channel width used- where higher values allow more bandwidth/throughput, but yield fewer free channels, and result in more overlapping channels. Using lower MHz channel width values yields more free non-overlapping channels but means less bandwidth/throughput is available. For a full table of possible MCS index connection rates see <a href="http://www.mcsindex.com" class="external autonumber" title="http://www.mcsindex.com" rel="nofollow">[1]</a>
</p><p><br>
<b>BEFORE DOING ANYTHING- MAKE NOTE:</b>
</p><p><b>1) Select your country first and YOU MUST HIT APPLY! The driver needs to reconfigure the country for the speific wifi chipset and then the router needs to get the updated channel list for your country</b>
</p><p><b>2) Set the Channel Width and hit Save.</b>
</p><p><b>3A) Select the correct WiFi "carrier" channel and concurrently go to step 3B.</b>
</p><p><b>3B) Set the Extension Channel UU, LL, UL, or LU .</b> (See table below of valid VHT80 &amp;VHT160 extensions)
</p><p><br>
<i>Carrier channel is defined as the main 20Mhz channel that "carrying" the signal. Extension channels are then added to yield HT40, VHT80, and VHT160. </i>
</p><p><br>
<b>Available Settings (2.4 GHz):</b> Dynamic (20/40 MHz), Wide HT40* (40 MHz), Full (20 MHz), Half (10 MHz)*, Quarter (5 MHz)*
</p><p><i>*Note 1: You MUST have this setting on Wide HT40 (40 MHz) to allow 802.11n devices (2.4 GHz &amp; 5 GHz) to connect at their max!</i>
<i>*Note 2&amp;3: Half (10MHz) and Quarter (5MHz) may not be supported on all models. It is best to just use Full (20MHz) or wider.</i> 
</p><p><b>Available Settings (5 GHz):</b> VHT160*, VHT160 (80+80 MHz)*, VHT80 (80 MHz)*, Dynamic (20/40 MHz), Wide HT40 (40 MHz), Full (20 MHz)
</p><p><i>*Note: VHT80 (80 MHz), VHT160 (80+80 MHz), &amp; VHT160 is only displayed &amp; available for 802.11ac (5 GHz) routers that support it, &amp; it's required to reach the max MCS link rates of 802.11ac</i>
</p><p><i>*WARNING ABOUT USING VHT160-Using DFS channels can significantly increase 5 GHz association times because devices (STAs) can only passively scan for available APs. So instead of being able to send out a probe request and waiting for APs to reply, a STA using DFS channels must wait until an AP announces itself. You wouldn't think this would make much difference, but when switching from running 2.4 to 5 GHz tests, it took over a minute to find and associate to the router's 5 GHz SSID.</i>
</p>
<hr>
<p><b>Default Settings (2.4ghz):</b> Full (20 MHz)
</p><p><br>
<b>Recommended Setting (2.4 GHz):</b> Full (20 MHz)- Why? Because nearly all cell phones and tablets will limit their channel width to only 20MHz if they detect neighboring routers/wifi AP's and so 40MHZ wide communication will not be allowed; even if you enable HT40 on the router.  Your mileage may vary by enabling HT40 on the router for phones and tablets. As far as Laptops/Desktops, they usually have a way to allow 40MHz wide channels in the advanced driver settings. Disable "Fat Channel Intolerant" to take advantage of 40MHz on Windows OS's. Using HT40 enables channel bonding by using 2x20 MHz wide channels together to equal 40Mhz; but, it's considered "not neighbor friendly" and discouraged by industry standards- as noted above for android &amp; iPhone HT20 limit. Using HT40 may, <b>but usually doesn't</b>, create more interference for neighbors; it's usually not an issue unless you're in VERY packed/dense/congested wireless area like apartments- Again YMMV with HT40. HT40 allows your 802.11n devices to connect at their max rate: 300 Mbps (2x2:2 stream clients).
</p><p><i>*Note: 193mbps is not an officially recognized MCS index rate, but some devices have reported 193mbps vs 173; 173 is the maximum for 2x2:2 stream clients per 802.11ac industry standards.</i>
</p><p><b>Recommended Setting (5 GHz):</b> VHT80 (80 MHz), or Wide HT40 (40 MHz). For wifi 5-wave 2 routers, VHT160 can only be taken advantage of by two/three Intel Wifi cards right now (9260/9265/AX200 2x2:2); otherwise, backhaul from one VHT160 capable router to another VHT160 capable router is the other reason to use VHT160 right now. Also to note, VHT160 operates in spectrum which requires reduced TX pwr vs. VHT80: VHT160 spectrum only allows 23dBm vs. 30dBm for VHT80 (USA and similar countries). So, use VHT160 if you know you have clients that can take advantage of it; but realize your TX distance may be worse than if you use VHT80. Also note, it may take up to a minute to find your 5ghz signal if using VHT160 mode.
</p><p><br>
<i>Lastly, very few clients are 3x3 or 4x4 stream capable; usually only desktop wifi cards are 3x3 or 4x4 (due to space limits in tablets, phones, and laptops &amp; cost of more antenna's). You'll obviously gain more throughput by having 3x3 or 4x4 capable routers &amp; clients. Nearly all phones and tablets are 2x2:2 stream devices, at best, right now (limited room for 4 antenna's &amp; cost too). AFAIK, all laptops use 2x2:2 stream cards; though, apple has a few 3x3:3 stream cards in their devices...use google to find 3x3 or 4x4 stream wifi clients.</i>
</p>
<hr>
<p><br>
<b>!!!For BCM routers, you need to swap UU, UL, LU, and LL meanings (Not sure if this is a BCM issue or how BS coded the tables in the code)!!!</b>
</p><p><b><i>FOR BCM-confirmed that in the table below you need to swap:</i></b>
</p>
<pre>UU- Select LL in gui 
UL- Select LU in gui
LU- Select UL in gui
LL-Select UU in gui
</pre>
<p>The below is the technical "right" way to describe the extension channels- use the above conversion on BCM routers. QCA implements per the below.
</p><p>Valid VHT80 channels are: 
</p>
<ul><li> 36+UU 
</li><li> 40+UL 
</li><li> 44+LU 
</li><li> 48+LL 
</li><li> 52+UU 
</li><li> 56+UL 
</li><li> 60+LU 
</li><li> 64+LL 
</li><li> 100+UU 
</li><li> 104+UL 
</li><li> 108+LU 
</li><li> 112+LL 
</li><li> 116+UU 
</li><li> 120+UL 
</li><li> 124+LU 
</li><li> 128+LL 
</li><li> 132+UU 
</li><li> 136+UL 
</li><li> 140+LU 
</li><li> 144+LL 
</li><li> 149+UU 
</li><li> 153+UL 
</li><li> 157+LU 
</li><li> 161+LL 
</li></ul>
<p><br>
</p><p>Valid VHT160 channels are: * 36+UUU 
</p>
<ul><li> 64+LLL 
</li><li> 100+UUU 
</li><li> 128+LLL
</li></ul>
<a name="Sensitivity_Range_.28ACK_Timing.29"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=11" title="Edit section: Sensitivity Range (ACK Timing)">edit</a>]</span> <span class="mw-headline"> Sensitivity Range (ACK Timing)  </span></h2>
<p><b>Available Settings:</b> 0 ~ 999999 (meters) 
</p><p><b>Default Setting:</b> 500 (Used to be 2000 meters or approx. 1.242742 Miles) 
</p><p><b>Recommended Setting:</b> 90 (meters) for both bands. IEEE Spec is 300 feet and realistic! (90 meters is approx. 295.276 feet and most compatible with Atheros settings! 2000 meters is 1.242742 miles!). Unless you are using specialized equipment outdoors (For example Ubiquiti Networks equipment) you will suffer performance issues, cross-talk, and throughput drops. Try 90 first, if you have issues then try higher values like 120 up to 500 (in increments of 5). Values over 500 are only used when <b>needed</b> for long distance high performance links using specialized equipment.
</p><p><br>
<b>The help file says...</b> * Adjusts the ACK timing in Atheros typical way based on the maximum distance in meters. 
</p><p>A value of 0 disables ACK timing completely for Broadcom firmware. 
On Atheros based firmware a value of 0 will turn into auto ACK timing mode. 
<b>BCM users, you can try setting ACK timing to 0 and check performance on clients- this may cause issues on QCA based clients.</b>
</p><p><br>
<b>How it works:</b> # AP sends a message: Everybody wait X time for a response 
</p>
<ol><li> Client receives 
</li><li> Client sends a response to the AP called an ACK - Acknowledges the command waiting for X time. 
</li><li> AP sees the ACK 
</li><li> Other Clients and AP are free to send 
</li></ol>
<p><br>
</p><p>-ACK timing adjustment is used for distance links when the time needed to transmit is greater than the amount of time the sender waits before retrying to transmit the same packet again. 
</p><p>-You want to set the ACK timing to 2x the distance between bridged routers measured in meters. 
</p><p>-If the ACK timing is too high it will not affect the throughput that much. If the ACK time is too low it can drop your throughput to the point of being unusable and can even make the system not connect. 
</p><p>-Recommended setting is 0 for a household network. Which for Linksys users means DD-WRT doesn't use ACK timing at all.
</p>
<a name="Wireless_Network_Name_.28SSID.29"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=12" title="Edit section: Wireless Network Name (SSID)">edit</a>]</span> <span class="mw-headline"> Wireless Network Name (SSID) </span></h2>
<p><b>Default Setting:</b> ddwrt 
</p><p>This is where you can choose the name of your wireless network when its being broadcast to roaming clients. You can name this anything you want. 
</p><p><br>
</p>
<a name="Wireless_SSID_Broadcast"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=13" title="Edit section: Wireless SSID Broadcast">edit</a>]</span> <span class="mw-headline"> Wireless SSID Broadcast </span></h2>
<p><b>Available Settings:</b> Enable, disable 
</p><p><b>Default Setting:</b> Enable 
</p><p><b>Recommended Setting:</b> Enable 
</p><p>Dependent on the setting above, this controls if your SSID is being broadcast or not. When disable is selected many clients still pick up the beacon and display it as "Hidden" along with the AP's MAC address. Disabling is not recommended as it hardly does anything for security, a determined intruder can still access your network with different methods. 
</p>
<a name="Network_Configuration"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=14" title="Edit section: Network Configuration">edit</a>]</span> <span class="mw-headline"> Network Configuration </span></h2>
<p><b>Available Settings:</b> Unbridged, Bridged 
</p><p><b>Default Setting:</b> Bridged 
</p><p><b>Recommended Setting:</b> Bridged 
</p><p>This setting controls if the wireless interface is "bridged" with the LAN ports. Bridged meaning a client on the wireless interface and a client on the Ethernet LAN interface are on the same network on the same subnet. Unbridged allows you to "separate" the WLAN (wireless LAN) by giving it its own subnet and even its own DHCP server. If you want a unbridged interface, you are better off creating a VAP instead of unbridging the main interface.
</p>
<a name="Wireless_Security"></a><h2><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=15" title="Edit section: Wireless Security">edit</a>]</span> <span class="mw-headline">Wireless Security</span></h2>
<p>More info, not updated: <a href="/wiki/index.php/Wireless_security" title="Wireless security">Wireless Security</a>
</p>
<a name="Security_Mode"></a><h3><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=16" title="Edit section: Security Mode">edit</a>]</span> <span class="mw-headline">Security Mode</span></h3>
<p><b>Available Settings:</b> Disabled, WPA Personal, WPA Enterprise, WPA2 Personal, WPA2 Enterprise, WPA2 Personal Mixed, WPA2 Enterprise Mixed, RADIUS, WEP
</p><p><b>Default Setting:</b> Disabled
</p><p><b>Recommended Setting:</b> WPA2 Personal or WPA2 Personal Mixed (inc Enterprise)
</p><p><br>
Depends on what your network security needs are, for more advanced security like RADIUS etc. Do NOT use "WPA" (aka WPA1) only or WEP, they are weak ESPECIALLY WEP! Can be cracked easily, in seconds for the latter, they also go against the IEEE 802.11n/ac specification &amp; will usually force your link rates down to 802.11a/g speeds (54 Mbps!) This is one of the leading causes for users not knowing why they aren't getting N or AC speeds with DD-WRT.
</p><p><br>
Security from <font color="red">weakest</font> --&gt; <font color="green">strongest</font> goes in the following order (not counting enterprise):
</p><p><br>
<font color="red">Unsecured</font> --&gt; WEP --&gt; WPA+TKIP --&gt; WPA+AES --&gt; <font color="green">WPA2+AES</font>
</p><p><br>
</p>
<a name="WPA_Algorithms"></a><h3><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=17" title="Edit section: WPA Algorithms">edit</a>]</span> <span class="mw-headline">WPA Algorithms</span></h3>
<p><b>Available Settings:</b> AES, TKIP+AES, TKIP
</p><p><b>Default Setting:</b> Disabled
</p><p><b>Recommended Setting:</b> AES
</p><p><br>
The core of your wireless security strength besides having a complex password &amp; works hand in hand with security mode, to follow IEEE 802.11n/ac spec, you MUST use WPA2 Personal or WPA2 Personal Mixed + AES (inc Enterprise) do NOT ever, ever, use TKIP or even TKIP+AES or you will be forced down to a/g speeds along with your wireless security being weak. If you have some older devices that don't support WPA2, only WPA &amp; WEP, don't worry &amp; do NOT use WEP! Use WPA2 Personal Mixed + AES, this still follows spec &amp; allows full speed link rates with the best security possible. By default all wireless devices always connect using their strongest supported security, ie if your network has all WPA2 AES supported clients, but you have a PSP that only supports WPA AES, your other clients will still use WPA2 AES while the PSP uses WPA AES, no problem. <b>Having this set to TKIP or TKIP+AES in conjunction with incorrect security mode noted above, is THE leading cause of not getting n/ac speeds in DD-WRT.</b> <a href="http://en.wikipedia.org/wiki/Advanced_Encryption_Standard" class="external text" title="http://en.wikipedia.org/wiki/Advanced_Encryption_Standard" rel="nofollow">See this link for more in depth info about AES which stands for Advanced Encryption System.</a>
</p><p><br>
</p>
<a name="WPA_Shared_Key"></a><h3><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=18" title="Edit section: WPA Shared Key">edit</a>]</span> <span class="mw-headline">WPA Shared Key</span></h3>
<p><b>Available Settings:</b> Anything
</p><p><b>Recommended Setting:</b> Whatever you want, make it rememberable &amp; difficult/random
</p><p><br>
This is your network password, make it complex coupled with WPA2 AES, you'll have the best security available, theres no WPA3 AES (yet)! The "unmask" checkbox toggles between hiding your password with the traditional dots, or displaying it in clear text.
</p><p><br>
</p>
<a name="Key_Renewal_Interval"></a><h3><span class="editsection">[<a href="/wiki/index.php?title=Basic_Wireless_Settings&amp;action=edit&amp;section=19" title="Edit section: Key Renewal Interval">edit</a>]</span> <span class="mw-headline">Key Renewal Interval</span></h3>
<p><b>Available Settings:</b> 1 ~ 99999
</p><p><b>Default Setting:</b> 3600
</p><p><b>Recommended Setting:</b> 3600
</p><p><br>
In seconds, which is 1 hour by default for almost every router firmware out there including stock (3600 sec = 1 hr), is how often the wireless encryption key is changed, this is NOT your password changing, this is within the core of how wireless security functions &amp; is a instant seamless silent event that happens with all connected clients every hour by default. Most users have no need to change this setting, its purpose is to further thwart off potential hackers &amp; thieves by having the encryption key change frequently, WPA2 AES is extremely hard to crack &amp; in the event a stranger in range was pulling their hair out trying to break in to your network, once the key refreshes they'll have to start all over again with a different encryption key to defeat.
</p><!-- 
Pre-expand include size: 3261 bytes
Post-expand include size: 1402 bytes
Template argument size: 276 bytes
Maximum: 2097152 bytes
-->

<!-- Saved in parser cache with key wiki_ddwrt-mw_:pcache:idhash:5515-0!1!0!!en!2 and timestamp 20210529050705 -->
<div class="printfooter">
Retrieved from "<a href="http://forum.dd-wrt.com/wiki/index.php/Basic_Wireless_Settings">http://forum.dd-wrt.com/wiki/index.php/Basic_Wireless_Settings</a>"</div>
            <div id="catlinks"><p class="catlinks"><a href="/wiki/index.php/Special:Categories" title="Special:Categories">Categories</a>: <span dir="ltr"><a href="/wiki/index.php/Category:Wlan" title="Category:Wlan">Wlan</a></span> | <span dir="ltr"><a href="/wiki/index.php/Category:Documentation" title="Category:Documentation">Documentation</a></span> | <span dir="ltr"><a href="/wiki/index.php/Category:Basic_tutorials" title="Category:Basic tutorials">Basic tutorials</a></span></p></div>            <!-- end content -->
            <!-- show back to top link only if the body is longer than the window height -->
            <script type="text/javascript">
                var winheight = parseInt(document.documentElement.clientHeight)
                var boheight = parseInt(document.body.scrollHeight)
                if(winheight <= boheight) {
                    document.write('<div class="backToTop"><a href="#" onclick="window.scrollTo(0,0);return false;" title="Back to the top of the page">&nbsp;</a></div>');
                }
            </script><div class="backToTop"><a href="#" onclick="window.scrollTo(0,0);return false;" title="Back to the top of the page">&nbsp;</a></div>
            <div class="visualClear"></div>
        </div>
    </div>