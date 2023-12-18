
Application

-   [Basic Setup](http://10.10.10.1/help/HSetup.asp)
-   [DDNS](http://10.10.10.1/help/HDDNS.asp)
-   [MAC Address Clone](http://10.10.10.1/help/HWanMAC.asp)
-   [Advanced Routing](http://10.10.10.1/help/HRouting.asp)
-   [Networking](http://10.10.10.1/help/HNetworking.asp)

Wireless

-   [Basic Settings](http://10.10.10.1/help/HWireless.asp)

`Wireless Physical Interface ath0 [2.4 GHz]
Physical Interface ath0 - SSID [dd-wrt] HWAddr [50:C7:BF:39:75:74]

Wireless Network Name (SSID)

The SSID is the network name shared among all devices in a wireless network. The SSID must be identical for all devices in the wireless network. It is case-sensitive and must not exceed 32 alphanumeric characters, which may be any keyboard character. Make sure this setting is the same for all devices in your wireless network.  

#### Note

For added security, it is recommended to change the default SSID dd-wrt to a unique name of your choice.

**Wireless Channel**

All devices in your wireless network must use the **same channel** in order to function correctly. Try to avoid conflicts with other wireless networks by choosing a channel where the upper and lower three channels are not in use.




---
-   [Radius](http://10.10.10.1/help/Hradauth.asp)

-   [Wireless Security](http://10.10.10.1/help/HWPA.asp)
-   [MAC Filter](http://10.10.10.1/help/HWirelessMAC.asp)
-   [Advanced Settings](http://10.10.10.1/help/HWirelessAdvanced.asp)
- ---


-   [WDS](http://10.10.10.1/help/HWDS.asp)
WDS (Wireless Distribution System) is a Wireless Access Point mode that enables wireless bridging in which WDS APs communicate only with each other only (without allowing for wireless clients or stations to access them), and/or wireless repeating in which APs communicate both with each other and with wireless stations (at the expense of half the throughput). This firmware currently supports two types of WDS, LAN and Point to Point.

a. LAN-type WDS

This is the easiest, and currently most common, type of WDS used for linking LANs. It is very simple to setup and requires no extra routing protocols or knowledge of networking. Simply put, it is pure bridging. A simple example would be extending the range of an existing AP by setting up a 2nd AP and connecting it to the first using LAN-type WDS.

1.  Make sure you are using the same [Wireless Settings](http://10.10.10.1/help/HWireless.asp) on both routers and not any type of [Wireless Security](http://10.10.10.1/help/HWPA.asp).
2.  Find a drop-down selection that has _Disabled_ displayed. Click this and select _LAN_, do the same on the other router.
3.  On the first router, take the numbers next to _Wireless MAC_ and enter them in to the second router on the same line that you set to "LAN".
4.  Take the Wireless MAC from the second router and enter them on the first router.
5.  Check for any typing errors and then click _Save Settings_.
6.  Go to the [Wireless Status](http://10.10.10.1/help/HStatusWireless.asp) page. You should see _WDS Link_ and the Wireless MAC of the other router listed, with a signal reading. If the signal is "0dBm" then there may be something wrong. Check your antenna connections and configuration settings, and try again.
7.  Once you have a good signal (-70dBm to -30dBm, -70dBm being lowest), you can change the _Internet Connection Type_ on the [Basic Setup](http://10.10.10.1/help/HSetup.asp) page of the second router to _Disabled_ and set the _Gateway_ to the LAN IP Address of the first router. You can now run normal tests to check if you are connected (like ping).

  
  

#### Note

WDS is only available in _AP_ mode. Also Wireless encryption _WPA2_ and Wireless network mode _B-Only_ are not supported under WDS.

---


**Services**

-   [Services](http://10.10.10.1/help/HServices.asp)
RFlow / MACupd

RFlow Collector is a traffic monitoring and management tool that allows to watch a complete network of DD-WRT routers.  

-   RFlow Default port is 2055
-   MACupd Default port is 2056
-   Interval = 10 seems messages will be sent to server each 10 seconds
-   Interface : choose which interface to monitor

  

#### Note

For each RFlow and MACupd server IP : enter the IP address of the listening server (win32 PC with RFlow Collector).

Secure Shell

Enabling SSHd allows you to access the Linux OS of your router with an SSH client (Putty works well on Windows, for example).

-   Password login – allow login with the router password (username is root)
-   SSHd Port – the port number for SSHd (default is 22)
-   Authorized Keys – here you paste your public keys to enable key-based login (more secure than a simple password)

System Log

Enable Syslogd to capture system messages. By default they will be collected in the local file /var/log/messages. To send them to another system, enter the IP address of a remote syslog server.

Telnet

Enable a telnet server to connect to the router with telnet. The username is root and the password is the router password.  
  

#### Note

If you using the router in an untrusted environment (for example as a public hotspot), it is strongly recommended to use SSHd and deactivate telnet.



-   [VPN](http://10.10.10.1/help/HPPTP.asp)
-   [USB](http://10.10.10.1/help/HUSB.asp)
-   [NAS](http://10.10.10.1/help/HNAS.asp)
-   [Hotspot](http://10.10.10.1/help/HHotspot.asp)

Security

-   [Firewall](http://10.10.10.1/help/HFirewall.asp)
-   [VPN Passthrough](http://10.10.10.1/help/HVPN.asp)

Access Restrictions

-   [WAN Access](http://10.10.10.1/help/HFilters.asp)

NAT / QoS

-   [Port Range Forwarding](http://10.10.10.1/help/HForward.asp)
-   [Port Forwarding](http://10.10.10.1/help/HForwardSpec.asp)
-   [Port Triggering](http://10.10.10.1/help/HTrigger.asp)
-   [UPnP](http://10.10.10.1/help/HUPnP.asp)
-   [DMZ](http://10.10.10.1/help/HDMZ.asp)
-   [QoS](http://10.10.10.1/help/HQos.asp)

Administration

-   [Management](http://10.10.10.1/help/HManagement.asp)
-   [Keep Alive](http://10.10.10.1/help/HAlive.asp)
-   [Commands](http://10.10.10.1/help/HDiagnostics.asp)
-   [WOL](http://10.10.10.1/help/HWol.asp)
-   [Factory Defaults](http://10.10.10.1/help/HDefault.asp)
-   [Firmware Upgrade](http://10.10.10.1/help/HUpgrade.asp)
-   [Backup](http://10.10.10.1/help/HBackup.asp)

Status

-   [Router](http://10.10.10.1/help/HStatus.asp)
-   [LAN](http://10.10.10.1/help/HStatusLan.asp)
-   [Wireless](http://10.10.10.1/help/HStatusWireless.asp)

Online / DD-WRT Community

-   [DD-WRT Homepage](http://www.dd-wrt.com)
-   [Forum](http://www.dd-wrt.com/forum)
-   [Wiki](http://www.dd-wrt.com/wiki)
-   [Bugtracker](http://www.dd-wrt.com/bugtracker)