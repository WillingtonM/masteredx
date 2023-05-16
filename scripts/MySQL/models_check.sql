-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;


-- DROP TABLE IF EXISTS `users`;

-- ************************************** `users`

CREATE TABLE IF NOT EXISTS `users`
(
  `user_id`            bigint NOT NULL AUTO_INCREMENT ,
  `company_id`         bigint NULL ,
  `office_id`          bigint NOT NULL ,
  `username`           varchar(45) NULL ,
  `email`              char(94) NULL ,
  `password`           varchar(255) NULL ,
  `name`               varchar(45) NULL ,
  `last_name`          varchar(45) NULL ,
  `gender`             TINYTEXT NULL ,
  `contact_number`     VARCHAR(45) NULL ,
  `alt_contact_number` VARCHAR(45) NULL ,
  `user_position`      VARCHAR(45) NULL ,
  `user_description`	 TEXT ,
  `user_province`      VARCHAR(45) NULL ,
  `user_listpos`			 TINYINT(1) NOT NULL DEFAULT 0 ,
  `last_seen`          datetime NULL ,
  `user_type`          tinytext NULL ,
  `user_type_id`       BIGINT NOT NULL DEFAULT 0,
  `user_image`         varchar(45) DEFAULT 'profile.png' ,
  `user_status`			   TINYINT(1) NOT NULL DEFAULT 1 ,
  `email_confirm`      tinyint DEFAULT 0 ,
  `email_confirm_code` varchar(255) NULL ,
  `pass_reset_code`    varchar(255) NULL ,
  `pass_reset_date`    datetime NULL ,
  `date_created`       datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `date_updated`       timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,

PRIMARY KEY (`user_id`)
);



-- ************************************** `user_types`
-- DROP TABLE IF EXISTS `user_types`;

-- ************************************** `user_types`

CREATE TABLE IF NOT EXISTS `user_types`
(
  `user_type_id`        BIGINT NOT NULL AUTO_INCREMENT ,
  `user_id`             bigint NOT NULL ,
  `company_id`          bigint NULL ,
  `user_type`           VARCHAR(45) NOT NULL ,
  `user_type_slug`      VARCHAR(45) NOT NULL ,
  `user_type_admin`     TINYINT DEFAULT 0 ,
  `permission_execute`  TINYINT DEFAULT 0 ,
  `permission_write`    TINYINT DEFAULT 0 ,
  `permission_read`     TINYINT DEFAULT 0 ,
  `user_type_default`   TINYINT DEFAULT 0 ,
  `user_type_status`    TINYINT DEFAULT 1 ,
  `date_updated`        timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
  `date_created`        datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,

PRIMARY KEY (`user_type_id`)
);


-- ************************************** `members`
-- DROP TABLE IF EXISTS `members`;

-- ************************************** `members`

-- CREATE TABLE IF NOT EXISTS `members`
-- (
--  `member_id`                    BIGINT NOT NULL AUTO_INCREMENT ,
--  `user_id`                      bigint NOT NULL ,
--  `company_id`                   bigint NOT NULL ,
--  `office_id`                    bigint NULL ,
--  `member_name`                  VARCHAR(45) NULL ,
--  `member_surname`               VARCHAR(45) NULL ,
--  `member_surname_initials`      VARCHAR(90) NOT NULL ,
--  `member_reference`             varchar(20) NULL ,
--  `member_location`              VARCHAR(45) NULL ,
--  `member_gender`                TINYTEXT NULL ,
--  `member_email`                 VARCHAR(45) NULL ,
--  `member_mobile`                VARCHAR(45) NULL ,
--  `member_type`                  TINYINT DEFAULT 0 ,
--  `member_time_type`             TINYINT DEFAULT 1 ,
--  `member_date_updated`          timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
--  `member_date_created`          datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
--  `member_status`                TINYINT DEFAULT 1 ,

-- PRIMARY KEY (`member_id`),
-- KEY `fkIdx_1044` (`user_id`),
-- CONSTRAINT `FK_1043` FOREIGN KEY `fkIdx_1044` (`user_id`) REFERENCES `users` (`user_id`)
-- );


-- ************************************** `associations`
-- DROP TABLE IF EXISTS `associations`;

-- ************************************** `associations`

-- CREATE TABLE IF NOT EXISTS `associations`
-- (
--  `association_id`               BIGINT NOT NULL AUTO_INCREMENT ,
--  `user_id`                      bigint NOT NULL ,
--  `member_id`                    bigint NOT NULL ,
--  `creator_user_id`              bigint NOT NULL ,
--  `practice_area_id`             bigint NOT NULL ,
--  `association_type`             TINYINT DEFAULT 0 ,
--  `association_date_updated`     timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
--  `association_date_created`     datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
--  `association_status`           TINYINT DEFAULT 1 ,

-- PRIMARY KEY (`association_id`)
-- );


-- ************************************** `articles`
-- DROP TABLE IF EXISTS `articles`;


-- ************************************** `articles`


CREATE TABLE IF NOT EXISTS `articles`
(
 `article_id`             bigint NOT NULL AUTO_INCREMENT ,
 `article_title`          varchar(255) NOT NULL ,
 `article_type`           varchar(45) NOT NULL ,
 `article_link`           varchar(255) NOT NULL ,
 `article_publisher`      varchar(255) NULL ,
 `article_content`        LONGTEXT NOT NULL ,
 `article_source`         varchar(255) NOT NULL ,
 `article_image`          varchar(255) NULL ,
 `article_file`           varchar(255) NULL ,
 `article_author`         varchar(255) NULL ,
 `article_status`         tinyint NOT NULL DEFAULT 1 ,
 `article_sent`           tinyint NOT NULL DEFAULT 0 ,
 `article_cronjob`        tinyint NOT NULL DEFAULT 0 ,
 `article_twitjob`        tinyint NOT NULL DEFAULT 0 ,
 `article_cronjob_status` tinyint NOT NULL DEFAULT 0 ,
 `article_cronjob_date`   datetime NULL ,
 `article_publish_date`   datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `article_date_created`   datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `article_date_updated`   timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
 `user_id`                bigint NOT NULL ,
 `article_shares`         int NOT NULL DEFAULT 0,

PRIMARY KEY (`article_id`),
KEY `fkIdx_1080` (`user_id`),
CONSTRAINT `FK_1080` FOREIGN KEY `fkIdx_1080` (`user_id`) REFERENCES `users` (`user_id`)
);



-- ***************************************************;

-- DROP TABLE IF EXISTS `article_comments`;
-- ************************************** `article_comments`

CREATE TABLE IF NOT EXISTS `article_comments`
(
 `article_comment_id`           bigint NOT NULL AUTO_INCREMENT ,
 `article_comment`              text NOT NULL ,
 `article_comment_type`         tinyint NOT NULL DEFAULT 0 ,
 `article_comment_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP  ,
 `article_comment_date_updated` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
 `article_comment_status`       tinyint NOT NULL DEFAULT 1 ,
 `comment_id`                   bigint NULL ,
 `user_id`                      bigint NOT NULL ,
 `article_id`                   bigint NOT NULL ,

PRIMARY KEY (`article_comment_id`),
KEY `fkIdx_1043` (`user_id`),
CONSTRAINT `FK_1043` FOREIGN KEY `fkIdx_1043` (`user_id`) REFERENCES `users` (`user_id`),
KEY `fkIdx_1050` (`article_id`),
CONSTRAINT `FK_1050` FOREIGN KEY `fkIdx_1050` (`article_id`) REFERENCES `articles` (`article_id`)
);




-- ***************************************************;
-- DROP TABLE IF EXISTS `feedback`;

-- ************************************** `feedback`

CREATE TABLE IF NOT EXISTS `feedback`
(
 `feedback_id`           bigint NOT NULL AUTO_INCREMENT ,
 `feedback_name`         varchar(255) NOT NULL ,
 `feedback_last_name`    varchar(255) NOT NULL ,
 `feedback_email`        varchar(255) NOT NULL ,
 `feedback_message`      text NOT NULL ,
 `feedback_status`       tinyint NOT NULL DEFAULT 1,
 `feedback_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `feedback_date_updated` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,

PRIMARY KEY (`feedback_id`)
);

-- ***************************************************;
-- DROP TABLE IF EXISTS `pages_content`;

-- ************************************** `pages_content`

CREATE TABLE IF NOT EXISTS `page_contents`
(
 `page_content_id`           bigint NOT NULL AUTO_INCREMENT ,
 `page_content_name`         varchar(255) NOT NULL ,
 `page_content`              text NOT NULL ,
 `page_content_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `page_content_date_updated` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,

PRIMARY KEY (`page_content_id`)
);



-- ***************************************************;
-- DROP TABLE IF EXISTS `email_subscription`;

-- ************************************** `email_subscription`

CREATE TABLE IF NOT EXISTS `email_subscription`
(
 `subscription_id`           bigint NOT NULL AUTO_INCREMENT ,
 `subscription_name`         varchar(255) NULL ,
 `subscription_last_name`    varchar(255) NULL ,
 `subscription_email`        varchar(255) NOT NULL ,
 `subscription_token`        varchar(255),
 `subscription_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `subscription_date_updated` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
 `subscription_edit`         tinyint NOT NULL DEFAULT 0 , 
 `subscription_status`       tinyint NOT NULL DEFAULT 1 ,

PRIMARY KEY (`subscription_id`)
);



-- ***************************************************;
-- DROP TABLE IF EXISTS `events`;

-- ************************************** `events`
CREATE TABLE IF NOT EXISTS `events`
(
 `event_id`           bigint NOT NULL AUTO_INCREMENT ,
 `user_id`            bigint NOT NULL ,
 `event_description`  text NULL ,
 `event_user_name`    varchar (255) NOT NULL ,
 `event_last_name`    varchar (255) NOT NULL ,
 `event_user_email`   varchar (255) NOT NULL ,
 `event_user_phone`   varchar (255) NULL ,
 `event_company_name` varchar (255) NULL ,
 `event_budget`       varchar (255) NULL ,
 `event_venue`        varchar (255) NULL ,
 `event_office`       varchar (255) NULL ,
 `event_user_count`   INTEGER (11) NULL ,
 `event_price`        varchar (255) NULL ,
 `event_address`      text NULL ,
 `event_message`      text NULL ,
 `event_processed`    tinyint NOT NULL DEFAULT 0 ,
 `event_period`       tinytext NULL ,
 `event_type`         tinytext NULL ,
 `event_host_date`    datetime NULL DEFAULT CURRENT_TIMESTAMP ,
 `event_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `event_date_updated` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,

PRIMARY KEY (`event_id`)
);


-- ***************************************************;
-- DROP TABLE IF EXISTS  `media`;

-- ************************************** `media`

CREATE TABLE IF NOT EXISTS `media`
(
 `media_id`           bigint NOT NULL AUTO_INCREMENT ,
 `media_title`        varchar(255) NOT NULL ,
 `media_content`      text NOT NULL ,
 `media_type`         varchar(255) NULL ,
 `media_url`          varchar(255) NULL ,
 `media_image`        varchar(255) NULL ,
 `media_status`       tinyint NOT NULL DEFAULT 1 ,
 `media_publish_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `media_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `media_date_updated` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  ,
 `user_id`            bigint NOT NULL ,

PRIMARY KEY (`media_id`),
KEY `fkIdx_1064` (`user_id`),
CONSTRAINT `FK_1064` FOREIGN KEY `fkIdx_1064` (`user_id`) REFERENCES `users` (`user_id`)
);



-- ***************************************************;
-- DROP TABLE IF EXISTS `article_visits`;



-- ************************************** `article_visits`

CREATE TABLE IF NOT EXISTS `article_visits`
(
 `visit_id`           bigint NOT NULL AUTO_INCREMENT ,
 `ip_address`         varchar(45) NOT NULL ,
 `visit_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `visit_date_updated` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
 `article_id`         bigint NOT NULL ,

PRIMARY KEY (`visit_id`),
KEY `fkIdx_1092` (`article_id`),
CONSTRAINT `FK_1092` FOREIGN KEY `fkIdx_1092` (`article_id`) REFERENCES `articles` (`article_id`)
);



-- ***************************************************;
-- DROP TABLE IF EXISTS `notifications`;


-- ************************************** `notifications`

CREATE TABLE IF NOT EXISTS `notifications`
(
 `notification_id`              bigint NOT NULL AUTO_INCREMENT ,
 `user_id`                      bigint NOT NULL ,
 `user_type`                    tinyint NOT NULL DEFAULT 0 ,
 `notification_alt_id`          bigint NULL ,
 `notification_database`        varchar(90) ,
 `notification_database_id`     bigint NULL ,
 `notification_type`            tinyint NOT NULL DEFAULT 0 ,
 `notification_read_status`     tinyint NOT NULL DEFAULT 0 ,
 `notification_message`         TEXT ,
 `notification_message_index`   TEXT ,
 `notification_status`          tinyint NOT NULL DEFAULT 1 ,
 `notification_created_date`    datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `notification_updated_date`    timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,

  PRIMARY KEY (`notification_id`)
);


-- ***************************************************;
-- DROP TABLE IF EXISTS `api_users`;

-- ************************************** `api_users`
-- CREATE TABLE IF NOT EXISTS `api_users`
-- (
--  `api_user_id`          bigint NOT NULL AUTO_INCREMENT ,
--  `user_id`              bigint NOT NULL ,
--  `oauth_uid`            bigint NULL ,
--  `oauth_provider`       varchar(140) NULL ,
--  `username`             varchar(140) NULL ,
--  `oauth_token`          varchar(255) NULL ,
--  `oauth_token_secret`   varchar(255) NULL ,
--  `first_name`           varchar(140) NULL ,
--  `last_name`            varchar(140) NULL ,
--  `user_email`           varchar(140) NULL ,
--  `user_locale`          varchar(140) NULL ,
--  `user_image`           varchar(140) NULL ,
--  `user_link`            varchar(140) NULL ,
--  `user_date_created`    datetime NULL ,
--  `user_date_updated`    datetime NULL ,
--  `user_status`          tinyint NOT NULL DEFAULT 1 ,

-- PRIMARY KEY (`api_user_id`)
-- );


-- ***************************************************;
-- DROP TABLE IF EXISTS `sms_orders`;

-- ************************************** `sms_orders`

-- CREATE TABLE IF NOT EXISTS `sms_orders`
-- (
--  `order_id`               bigint NOT NULL AUTO_INCREMENT ,
--  `user_id`                bigint NOT NULL,
--  `member_id`              bigint NOT NULL ,
--  `practice_task_id`       bigint NOT NULL ,
--  `email_confirmation`     tinyint NOT NULL DEFAULT 0 ,
--  `order_confirmation`     tinyint NULL DEFAULT 0 ,
--  `order_message`          TEXT ,
--  `payment_method`         varchar(45) NULL ,
--  `confirmation_token`     varchar(45) DEFAULT NULL ,
--  `order_complete`         tinyint(4) NOT NULL DEFAULT 0 ,
--  `order_amount`           float(11,2) DEFAULT NULL,
--  `order_amount_net`       float(11,2) DEFAULT NULL ,
--  `order_amount_fee`       float(11,2) DEFAULT NULL ,
--  `order_payment_id`       varchar(255) DEFAULT NULL ,
--  `order_token`            varchar(255) DEFAULT NULL ,
--  `order_status`           tinyint NOT NULL DEFAULT 0 ,
--  `order_payment_status`   tinyint NOT NULL DEFAULT 0 ,
--  `order_billing_date`     datetime DEFAULT NULL,
--  `order_date`             datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
--  `update_date`            timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,

-- PRIMARY KEY (`order_id`)
-- );


-- ***************************************************;
-- DROP TABLE IF EXISTS `registry`;

-- ************************************** `registry`

-- CREATE TABLE IF NOT EXISTS `registry`
-- (
--  `registry_id`               BIGINT NOT NULL AUTO_INCREMENT ,
--  `user_id`                   bigint NOT NULL ,
--  `hj`          bigint NOT NULL ,
--  `registry_comment`          TEXT ,
--  `registry_approve`          TINYINT DEFAULT 0 ,
--  `registry_status`           TINYINT DEFAULT 1 ,
--  `registry_date_updated`     timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
--  `registry_date_created`     datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,

-- PRIMARY KEY (`registry_id`)
-- );


-- ************************************** `practice_areas`
-- DROP TABLE IF EXISTS `practice_areas`;

-- ************************************** `practice_areas`

-- CREATE TABLE IF NOT EXISTS `practice_areas`
-- (
--  `practice_area_id`          BIGINT NOT NULL AUTO_INCREMENT ,
--  `user_id`                   bigint NOT NULL ,
--  `company_id`                bigint NOT NULL ,
--  `office_id`                 bigint NOT NULL ,
--  `practice_area`             varchar(255) NULL ,
--  `practice_area_slug`        varchar(255) NULL ,
--  `practice_area_type`        TINYINT DEFAULT 0 ,
--  `practice_date_updated`     timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
--  `practice_date_created`     datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
--  `practice_area_status`      TINYINT DEFAULT 1 ,

-- PRIMARY KEY (`practice_area_id`)
-- );


-- ************************************** `practice_tasks`
-- DROP TABLE IF EXISTS `practice_tasks`;

-- ************************************** `practice_tasks`

-- CREATE TABLE IF NOT EXISTS `practice_tasks`
-- (
--  `practice_task_id`          BIGINT NOT NULL AUTO_INCREMENT ,
--  `practice_area_id`          bigint NOT NULL ,
--  `user_id`                   bigint NOT NULL ,
--  `practice_task_name`        varchar(255) NULL ,
--  `practice_task_text`        TEXT ,
--  `practice_task_slug`        varchar(255) NULL ,
--  `practice_task_position`    INTEGER NOT NULL DEFAULT 1 ,
--  `practice_task_sms`         varchar(255) NULL ,
--  `practice_task_email`       varchar(255) NULL ,
--  `practice_task_sms_text`    varchar(255) NULL ,
--  `practice_task_email_text`  varchar(255) NULL ,
--  `practice_task_type`        TINYINT DEFAULT 0 ,
--  `practice_date_updated`     timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
--  `practice_date_created`     datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
--  `practice_task_status`      TINYINT DEFAULT 1 ,

-- PRIMARY KEY (`practice_task_id`)
-- );


-- ************************************** `activity_tasks`
-- DROP TABLE IF EXISTS `activity_tasks`;

-- ************************************** `activity_tasks`

-- CREATE TABLE IF NOT EXISTS `activity_tasks`
-- (
--  `activity_task_id`          BIGINT NOT NULL AUTO_INCREMENT ,
--  `user_id`                   bigint NOT NULL ,
--  `member_id`                 bigint NOT NULL ,
--  `practice_task_id`          bigint NOT NULL ,
--  `activity_task`             TEXT ,
--  `activity_task_date`        varchar(255) NULL ,
--  `activity_task_type`        TINYINT DEFAULT 0 ,
--  `activity_task_updated`     timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
--  `activity_task_created`     datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
--  `activity_task_status`      TINYINT DEFAULT 1 ,

-- PRIMARY KEY (`activity_task_id`)
-- );



-- ************************************** `companies`
-- DROP TABLE IF EXISTS `companies`;

-- ************************************** `companies`

CREATE TABLE IF NOT EXISTS `companies`
(
 `company_id`         BIGINT NOT NULL AUTO_INCREMENT ,
 `user_id`            bigint NOT NULL ,
 `company_name`       varchar(255) NULL ,
 `company_slug`       varchar(255) NULL ,
 `company_short`      varchar(255) NULL ,
 `company_description`TEXT ,
 `company_type`       varchar(255) NULL ,
 `company_updated`    timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
 `company_created`    datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `company_status`     TINYINT DEFAULT 1 ,

PRIMARY KEY (`company_id`)
);



-- ************************************** `offices`
-- DROP TABLE IF EXISTS `offices`;

-- ************************************** `offices`

CREATE TABLE IF NOT EXISTS `offices`
(
 `office_id`         BIGINT NOT NULL AUTO_INCREMENT ,
 `user_id`           bigint NOT NULL ,
 `company_id`        bigint NOT NULL ,
 `office_name`       varchar(255) NULL ,
 `office_slug`       varchar(255) NULL ,
 `office_short`      varchar(255) NULL ,
 `office_address`    TEXT ,
 `office_telephone`  varchar(255) NULL ,
 `office_phone`      varchar(255) NULL ,
 `office_updated`    timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
 `office_created`    datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `office_status`     TINYINT DEFAULT 1 ,

PRIMARY KEY (`office_id`)
);


-- ***************************************************;

INSERT INTO `users` (`user_id`, `user_type_id`, `company_id`, `office_id`, `username`, `email`, `password`, `name`, `last_name`, `last_seen`, `date_created`, `date_updated`, `user_status`) VALUES (1, 1, 1, 1, 'admin', 'info@tralon.co.za', '$2y$12$7ckh0OcRipJe7q2R0me/M.NPoPT6SyJIomXYXRD7skjT0TXg51RMu', 'Admin', '', '2020-01-02 06:55:27', '2020-01-02 00:00:00', '2020-01-02 00:00:00', 1)

ON DUPLICATE KEY UPDATE
username  = VALUES (username),
email     = VALUES (email),
password  = VALUES (password),
name      = VALUES (name),
last_name = VALUES (last_name)
;

-- ************************************** `insert user_types`

INSERT INTO `user_types` (`user_id`, `company_id`, `user_type_id`, `user_type`, `user_type_slug`, `user_type_default`,`user_type_admin`,`permission_execute`, `permission_write`, `permission_read`) VALUES (1, 1, 1, 'Administrator', 'admin',1,1,1,1,1), (1, 1, 2, 'Guest', 'guest',1,0,0,0,1)

ON DUPLICATE KEY UPDATE
user_type_id        = VALUES (user_type_id),
company_id          = VALUES (company_id),
user_type           = VALUES (user_type),
user_type_slug      = VALUES (user_type_slug),
user_type_default   = VALUES (user_type_default),
user_type_admin     = VALUES (user_type_admin),
permission_execute  = VALUES (permission_execute),
permission_write    = VALUES (permission_write),
permission_read     = VALUES (permission_read)
;

-- ************************************** `insert companies`

INSERT INTO `companies` (`user_id`, `company_name`, `company_slug`) VALUES (1, 'Default Company', 'default_company')

ON DUPLICATE KEY UPDATE
user_id             = VALUES (user_id),
company_name        = VALUES (company_name),
company_slug        = VALUES (company_slug)
;


-- ***************************************************;
-- DROP TABLE IF EXISTS `settings`;

-- ************************************** `settings`

CREATE TABLE IF NOT EXISTS `settings`
(
 `setting_id`           bigint NOT NULL AUTO_INCREMENT ,
 `user_id`              bigint NOT NULL ,
 `subscription_popup`   tinyint NOT NULL DEFAULT 0 ,
 `subscription_active`  tinyint NOT NULL DEFAULT 0 ,
 `article_email_length` tinyint NOT NULL DEFAULT 0 ,
 `setting_email_header` text NOT NULL ,
 `setting_email_footer` text NOT NULL ,
 `setting_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
 `setting_date_updated` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,

PRIMARY KEY (`setting_id`)
);
