<?php

namespace App\Http\Controllers;

use App\DataTables\ModtestDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModtestRequest;
use App\Http\Requests\UpdateModtestRequest;
use App\Repositories\ModtestRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ModtestController extends AppBaseController
{
    /** @var ModtestRepository $modtestRepository*/
    private $modtestRepository;

    public function __construct(ModtestRepository $modtestRepo)
    {
        $this->modtestRepository = $modtestRepo;
    }

    /**
     * Display a listing of the Modtest.
     *
     * @param ModtestDataTable $modtestDataTable
     *
     * @return Response
     */
    public function index(ModtestDataTable $modtestDataTable)
    {
        return $modtestDataTable->render('modtests.index');
    }

    /**
     * Show the form for creating a new Modtest.
     *
     * @return Response
     */
    public function create()
    {
        return view('modtests.create');
    }

    /**
     * Store a newly created Modtest in storage.
     *
     * @param CreateModtestRequest $request
     *
     * @return Response
     */
    public function store(CreateModtestRequest $request)
    {
        $input = $request->all();

        $modtest = $this->modtestRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modtests.singular')]));

        return redirect(route('modtests.index'));
    }

    /**
     * Display the specified Modtest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modtest = $this->modtestRepository->find($id);

        if (empty($modtest)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modtests.singular')]));

            return redirect(route('modtests.index'));
        }

        return view('modtests.show')->with('modtest', $modtest);
    }

    /**
     * Show the form for editing the specified Modtest.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modtest = $this->modtestRepository->find($id);

        if (empty($modtest)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modtests.singular')]));

            return redirect(route('modtests.index'));
        }

        return view('modtests.edit')->with('modtest', $modtest);
    }

    /**
     * Update the specified Modtest in storage.
     *
     * @param int $id
     * @param UpdateModtestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModtestRequest $request)
    {
        $modtest = $this->modtestRepository->find($id);

        if (empty($modtest)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modtests.singular')]));

            return redirect(route('modtests.index'));
        }

        $modtest = $this->modtestRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modtests.singular')]));

        return redirect(route('modtests.index'));
    }

    /**
     * Remove the specified Modtest from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modtest = $this->modtestRepository->find($id);

        if (empty($modtest)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modtests.singular')]));

            return redirect(route('modtests.index'));
        }

        $this->modtestRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modtests.singular')]));

        return redirect(route('modtests.index'));
    }
}
