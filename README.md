Cybergateway-Ansible-Deployment
===============================
Prerequisite: Kerberos service keytabs for "host" and "HTTP" are installed properly on the SDA web server machines, with:
  - Kerberos SSH properly configured and enabled;
  - Kerberos HTTP keytab is available at /etc/httpd/conf/http.keytab.  

Playbooks:
   - restart.yml: Restart Tomcat and HTTPD on web server machines.
   - sda.yml: Redeploy SDA software.
   - site.yml: Complete deployment from scratch. 

Hosts: Define the list of web servers and front end balancer.

Roles:
   - common: create sda webserver user, setup Oracle Java, install Apache, mod_ssl, mod_auth_kerb, PHP, and configure HTTP firewall rules. 
   - sda_http: configure HTTPD conf files on web servers.
   - balancer: configure HTTPD conf file on load balancer. 
   - sda_tomcat: install, configure and startup Tomcat server.  
   - sda_deploy: deploy SDA software, including index.php and error.html templates.  
