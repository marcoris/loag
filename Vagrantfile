# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
 
    # Box Settings
    config.vm.box = "ubuntu/bionic64"
   
    # Provider Settings
    config.vm.provider "virtualbox" do |vb|
      vb.memory = 1024
      vb.cpus = 2
    end
   
    # Network Settings
    config.vm.network "forwarded_port", guest: 80, host: 8080
    config.vm.network "forwarded_port", guest: 3306, host: 3306
    config.vm.network "private_network", ip: "192.168.33.10"
   
    # Folder Settings
    config.vm.synced_folder ".", "/var/www/html", type: "virtualbox"
    
    # Setup
    config.vm.provision "shell", path: "setup.sh"
   end
