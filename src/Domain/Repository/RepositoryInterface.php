<?php

namespace CleanPhp\Invoicer\Domain\Repository;

use CleanPhp\Invoicer\Domain\Entity\AbstractEntity;

interface RepositoryInterface
{
	/**
	 * Retrieve entity by its ID
	 *
	 * @param int $id
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
	 * @param AbstractEntity $entity
	 */
	public function persist(AbstractEntity $entity);

	public function begin();

	public function commit();
}
