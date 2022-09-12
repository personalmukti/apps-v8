<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateModtestAPIRequest;
use App\Http\Requests\API\UpdateModtestAPIRequest;
use App\Models\Modtest;
use App\Repositories\ModtestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ModtestResource;
use Response;

/**
 * Class ModtestController
 * @package App\Http\Controllers\API
 */

class ModtestAPIController extends AppBaseController
{
    /** @var  ModtestRepository */
    private $modtestRepository;

    public function __construct(ModtestRepository $modtestRepo)
    {
        $this->modtestRepository = $modtestRepo;
    }

    /**
     * Display a listing of the Modtest.
     * GET|HEAD /modtests
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $modtests = $this->modtestRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            ModtestResource::collection($modtests),
            __('messages.retrieved', ['model' => __('models/modtests.plural')])
        );
    }

    /**
     * Store a newly created Modtest in storage.
     * POST /modtests
     *
     * @param CreateModtestAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateModtestAPIRequest $request)
    {
        $input = $request->all();

        $modtest = $this->modtestRepository->create($input);

        return $this->sendResponse(
            new ModtestResource($modtest),
            __('messages.saved', ['model' => __('models/modtests.singular')])
        );
    }

    /**
     * Display the specified Modtest.
     * GET|HEAD /modtests/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Modtest $modtest */
        $modtest = $this->modtestRepository->find($id);

        if (empty($modtest)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/modtests.singular')])
            );
        }

        return $this->sendResponse(
            new ModtestResource($modtest),
            __('messages.retrieved', ['model' => __('models/modtests.singular')])
        );
    }

    /**
     * Update the specified Modtest in storage.
     * PUT/PATCH /modtests/{id}
     *
     * @param int $id
     * @param UpdateModtestAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModtestAPIRequest $request)
    {
        $input = $request->all();

        /** @var Modtest $modtest */
        $modtest = $this->modtestRepository->find($id);

        if (empty($modtest)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/modtests.singular')])
            );
        }

        $modtest = $this->modtestRepository->update($input, $id);

        return $this->sendResponse(
            new ModtestResource($modtest),
            __('messages.updated', ['model' => __('models/modtests.singular')])
        );
    }

    /**
     * Remove the specified Modtest from storage.
     * DELETE /modtests/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Modtest $modtest */
        $modtest = $this->modtestRepository->find($id);

        if (empty($modtest)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/modtests.singular')])
            );
        }

        $modtest->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/modtests.singular')])
        );
    }
}
