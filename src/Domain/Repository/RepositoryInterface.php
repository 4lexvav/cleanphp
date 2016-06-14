<?php

namespace CleanPhp\Invoicer\Domain\Repository;

interface RepositoryInterface
{
	/**
	 * Retrieve entity by its ID
	 *
	 * @return AbstractEntity
	 */
	public function getById($id);

	/**
	 * Retrieve all entities of specific type
	 */
	public function getAll();

	/**
	 * Save entity
	 *
	 * @param AbstractEntity
	 */
	public function persist(AbstractEntity $entity);

	public function begin();

	public function commit();
}