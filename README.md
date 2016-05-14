# Raspkey


Raspkey is a pen-drive size device for all text encryption & decryption needs of an average internet user.

Raspkey project addresses three major concerns with cryptography:
1. Keeping user’s cryptographic keys safe - by always keeping it behind the router. Modern routers come with good default firewall settings.
2. Providing extremely simple enc/dec interface to an average user - open a new tab to encrypt and decrypt a text.
3. Cheap one-time cost  - at about $6 per device, good for a life-time.

While focussing on the areas mentioned above, we decided not to focus on the following valid and important concerns:
1. Theft of actual device - anyone with the device can encrypt / decrypt messages meant for the device.
2. Getting the public key of a receiver from other key-servers - we trust our key server alone.
3. Communication from your system to raspkey - we are not using TLS for that connection currently.
4. Ability to retrieve private key from Raspkey - new keys can be generated but private keys of old keys cannot be retrieved.
5. Expiry of keys - all Raspkey keys have no expiry.
6. Revocation of a key - this might be implemented later on, but currently you cannot revoke a key.
7. Signing of messages or keys - we currently don’t support signing in any form.
8. Raspkey.com key server comprised - we are hoping to keep public keys in this centralized server open to all for inspection. People can point out if the Raspkey.com has been compromised and the keys are changed by an external entity.


#Installation
Place the entire repository on a raspberry pi and run raspberry_install.sh


#How it works


Three parts to the entire Raspkey project are:
1. Your system with a web browser (MacOsX, Windows or Linux)
2. Raspkey Device connected to a router with internet access
3. Raspkey.com - Centralized key server.


#Encryption / Decryption Workflow
The encryption workflow that we are promoting with Raspkey is:
1. User opens a new tab in the browser
2. User goes to 192.168.1.240 (static IP)
3. Inputs the email address of the recipient
4. Inputs the plain text

The decryption flow is very similar:
1. User opens a new tab in the browser
2. User goes to 192.168.1.240 (static IP)
3. Inputs the encrypted text

Our script on github.com has an installation script, when the installation script is triggered - it sets up a raspberry pi (with raspbian os) with the necessary packages such as a webserver, (enough) randomness generator, gpg, etc.

It also creates a key during the first login, and uploads the key to Raspkey.com which signs the uploaded public key after an email verification.

When the Raspkey device gets an encryption request for a specific email address, it goes to the Raspkey.com server and asks for the public key corresponding to that email address and then encrypts the message with that using GPG.

When the Raspkey device gets a decryption request, it decrypts it with locally stored private key.

Your browser, on the other hand, contacts Raspkey device over the LAN and interacts 

