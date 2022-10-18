CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;


USE appDB;

CREATE TABLE IF NOT EXISTS accounts(
	acc_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	username VARCHAR(50) NOT NULL,
  	passwords VARCHAR(50) NOT NULL,
  	email VARCHAR(100) NOT NULL
);




INSERT INTO accounts (username, passwords, email) VALUES ('admin', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user1', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user2', 'admin', 'test@test.com');
INSERT INTO accounts (username, passwords, email) VALUES ('test_user3', 'admin', 'test@test.com');

CREATE TABLE IF NOT EXISTS posts(
	post_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  	post_user VARCHAR(50) NOT NULL,
  	post_info VARCHAR(500) NOT NULL
);

INSERT INTO posts (post_user, post_info) VALUES ('admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat imperdiet rhoncus. Maecenas in nisi rutrum, congue leo sed, venenatis dolor. Integer eget mauris at sem tristique ultricies. Maecenas cursus nisl pretium, venenatis sapien auctor, viverra ipsum. Aliquam at efficitur sem. Vestibulum ornare placerat metus, et condimentum ante lacinia ut. ');

INSERT INTO posts (post_user, post_info) VALUES ('test_user1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat imperdiet rhoncus. Maecenas in nisi rutrum, congue leo sed, venenatis dolor. Integer eget mauris at sem tristique ultricies. Maecenas cursus nisl pretium, venenatis sapien auctor, viverra ipsum. Aliquam at efficitur sem. Vestibulum ornare placerat metus, et condimentum ante lacinia ut. ');

INSERT INTO posts (post_user, post_info) VALUES ('admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas volutpat imperdiet rhoncus. Maecenas in nisi rutrum, congue leo sed, venenatis dolor. Integer eget mauris at sem tristique ultricies. Maecenas cursus nisl pretium, venenatis sapien auctor, viverra ipsum. Aliquam at efficitur sem. Vestibulum ornare placerat metus, et condimentum ante lacinia ut. ');

INSERT INTO posts (post_user, post_info) VALUES ('test_user2', '13 years - Gregory and I with Josh and Erik. Gregory is 10 months and Josh is about 5 years 18 years - Dave and I when we were first married. Dave has since passed away. Today is his birthday. We were married in the Sacramento Temple Donna (my mother in law) and Lito are part of the centenarian group, and I am hoping to get a shot of them one day! Vic is going to be 99 years old this year. I just watched his birthday video on YouTube - I cried and cried! He looks so handsome and happy. I am sad ');

INSERT INTO posts (post_user, post_info) VALUES ('test_user1', 'Make no mistake: The Russians will stop at nothing to get their way, in their warped ideological view of world order. They will again deploy their preferred “underdogs”  Islamist terrorists and Syrias dictator Bashar al-Assad, which Moscow regards as “like a son”.However, in a battle between Russian imperialism and the Western world, Moscow would do well to remember that the West’s common values are its');

INSERT INTO posts (post_user, post_info) VALUES ('admin', 'Jacob Shields, 17, was wearing a camouflage baseball cap, a North Face coat and his bright orange vest, which concealed the Shredded Wheat box he had with him, said Mr Hennessy. Mr Shields, who is due to complete his O-Levels next week, was arrested by the police. The schoolboy was charged with theft and bailed to appear at Kells Magistrates Court on Friday. Online Editors Dont miss out on all the');

