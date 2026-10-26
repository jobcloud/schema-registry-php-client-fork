# Upgrade guide

Here BC breaks between major versions and upgrade paths are described.

## 3.x to 4.x

- 3 new methods in `CacheAdapterInterface`. See [this commit message](https://github.com/flix-tech/schema-registry-php-client/commit/ebf27bd3fb793ac7501a99983ad99628d75f0b9e)
for explanation and upgrade path.

## 4.x to 5.x

- The Avro dependency changed from `rg/avro-php` to `flix-tech/avro-php` (`^2.0`) to fix a critical bug. If you require `rg/avro-php` directly, switch to `flix-tech/avro-php`.

## 5.x to 6.x

- `flix-tech/avro-php` `^3.0` is required (formerly `^2.0`). The `replace` entry for `flix-tech/avro-php` in `composer.json` was removed, so the package is now installed from Packagist instead of being replaced by `wikimedia/avro`.

## 6.x to 7.x

- PHP 7.1 support was dropped and the library is making use of the full PHP 7.2 feature set

## 7.x to 8.x

- `flix-tech/avro-php` `^5.0` is required (8.0.0, formerly `^4.3`).
- PHP 7.2 support was already dropped in 7.4.0 (minor release). The supported PHP range is `^7.4|^8.0`.
- Guzzle 7 (7.5.0) and `guzzlehttp/psr7` `^1.7|^2.1` (7.5.1) were added in minor releases of 7.x. `guzzlehttp/promises` `^2.0` was added in 8.1.0.

## 8.1.x to 8.2.x

- The `$hashAlgoFunc` parameter of `CachedRegistry::__construct()` is now explicitly nullable (`?callable`). This avoids the implicit nullable deprecation of PHP 8.4 and has no BC impact.
- Guzzle 8 (`guzzlehttp/guzzle ^8.0`, `guzzlehttp/promises ^3.1`, `guzzlehttp/psr7 ^3.2`) is supported in addition to Guzzle 7. No BC break, Guzzle 7 stays supported.
- The library no longer uses the `\GuzzleHttp\json_encode()` and `\GuzzleHttp\json_decode()` helpers, which were removed in Guzzle 8. If your own code relies on them, switch to `json_encode()` / `json_decode()` with `JSON_THROW_ON_ERROR`.
- Guzzle 8 only provides `getResponse()` on `GuzzleHttp\Exception\ResponseException`, not on every `RequestException` anymore. The `ExceptionMap` throws a `RuntimeException` for a `RequestException` without a response (e.g. a connection error), as it already did when `getResponse()` returned `null` with Guzzle 7.
- `guzzlehttp/promises` 3 declares `PromiseInterface` as generic. The promise return types are documented as `PromiseInterface<mixed, mixed>`. This has no runtime impact, but static analysis tools may report errors with `guzzlehttp/promises` 1 or 2 if you copy these annotations.
- PHP 8.5 is covered by the CI.
- The minimum versions were raised to the releases that fix known security advisories: `guzzlehttp/guzzle` `^7.15.2|^8.0.1` (formerly `^7.0`; e.g. CVE-2026-69246 and CVE-2022-31091) and `guzzlehttp/psr7` `^2.12.3|^3.2` (CVE-2026-48998, CVE-2026-49214, CVE-2026-55766, CVE-2026-59882, formerly `^1.7|^2.1|^3.2`). `guzzlehttp/psr7` 1.x is no longer supported. If you are still on one of these versions, update them (`composer update guzzlehttp/guzzle guzzlehttp/psr7`).
