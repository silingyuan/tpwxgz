CREATE TABLE sc_cache (
       cachekey varchar(255) NOT NULL,
       expire int(11) NOT NULL,
       data blob,
       datacrc int(32),
       UNIQUE KEY `cachekey` (`cachekey`)
    );
