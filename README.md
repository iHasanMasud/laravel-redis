## Laravel-Redis

### What is Cache?
Cache is a hardware or software component that stores data temporarily. It's designed to serve as a high-speed access point for frequently used data, reducing the need to retrieve that data from a slower, primary source like a disk or a remote server.

Caches work based on the principle of locality, which means that frequently accessed data tends to be accessed again in the near future. When a system or application requests data, the cache checks if it already has a copy of that data. If it does, the data is fetched from the cache, which is much faster than retrieving it from the original source. If the data isn't in the cache (a cache miss), it's fetched from the primary source, and a copy may be stored in the cache for future use.

Caches are crucial in optimizing performance for various computing systems, including CPUs, web servers, and databases, as they help reduce latency and improve overall system responsiveness.

### What is Redis?
It's a nifty open-source, in-memory server-assisted client-side data store and caching system. Redis is a key-value database, which means it stores data as pairs of keys and values. It's known for its speed because it keeps all its data in memory, making read and write operations lightning-fast.

### How to install Redis on Windows?
1. Download Redis-x64-3.2.100.msi file from https://github.com/MicrosoftArchive/redis/releases
2. Run and install it.
3. Then open the Redis folder (C:\Program Files\Redis) and run "redis-server.exe" file.
4. Run "redis-cli.exe" file to check if and type ping it will return pong

### How to install Redis on Linux?
1. Open terminal and type "sudo apt-get install redis-server"
2. Then type "redis-cli" to check if it's working and type ping it will return pong

### Setting up Laravel
```shell
composer create-project laravel/laravel laravel-redis
```
```shell
cd laravel-redis
```
```shell
php artisan serve
```
### Installing Redis
```shell
composer require predis/predis
```
When the installation is complete, we can find our Redis configuration settings in _config/database.php_.
After that is done, go ahead to register your _REDIS_CLIENT_ in the _.env_ file:
```
REDIS_CLIENT=predis
```
