<?php declare(strict_types=1);
/**
 * IP Coder base
 *
 * @package wp-fail2ban-addon-blocklist
 * @since   2.0.0
 */
namespace    com\wp_fail2ban\addons\Blocklist;

/**
 *
 * @since  2.0.0
 */
abstract class Coder
{
    /**
     * @var string[] Uninteresting IP ranges
     *
     * @since  2.0.0
     */
    public const IPV4_RANGES = [
        '0.0.0.0/8',
        '10.0.0.0/8',
        '100.64.0.0/10',
        '127.0.0.0/8',
        '169.254.0.0/16',
        '172.16.0.0/12',
        '192.0.0.0/24',
        '192.0.2.0/24',
        '192.88.99.0/24',
        '192.168.0.0/16',
        '198.18.0.0/15',
        '198.51.100.0/24',
        '203.0.113.0/24',
        '224.0.0.0/4',
        '240.0.0.0/4',
        '255.255.255.255/32'
    ];

    /**
     * @var string[] Uninteresting IP ranges
     *
     * @since  2.0.0
     */
    public const IPV6_RANGES = [
        '::/128',
        '::1/128',
        '::ffff:0:0/96',
        '::ffff:0:0:0/96',
        '64:ff9b:1::/48',
        '100::/64',
        '2001:20::/28',
        '2001:db8::/32',
        '2002::/16',
        'fc00::/7',
        'fe80::/64' // technically from fe80::/10
    ];
}

