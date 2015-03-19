<?php

namespace tbn\QueryBuilderRepositoryGeneratorBundle\CacheWarmer;

use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;
use tbn\QueryBuilderRepositoryGeneratorBundle\Generator\RepositoryGenerator;

/**
 *
 * @author Thomas BEAUJEAN
 *
 */
class RepositoryGeneratorWarmer implements CacheWarmerInterface
{
    /**
     *
     * @param RepositoryGenerator $repositoryGenerator
     */
    public function __construct(RepositoryGenerator $repositoryGenerator)
    {
        $this->repositoryGenerator = $repositoryGenerator;
    }

    /**
     * Warms up the Rcache.
     *
     * @param string $cacheDir The cache directory
     */
    public function warmUp($cacheDir)
    {
        $directory = '/tbn/QueryBuilderRepositoryGeneratorBundle';

        //generate files
        $this->repositoryGenerator->generateFiles($cacheDir.$directory);
    }

    /**
     * Checks whether this warmer is optional or not.
     *
     * Optional warmers can be ignored on certain conditions.
     *
     * A warmer should return true if the cache can be
     * generated incrementally and on-demand.
     *
     * @return Boolean true if the warmer is optional, false otherwise
     */
    public function isOptional()
    {
        return false;
    }
}