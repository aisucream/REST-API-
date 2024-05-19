                                {{-- ACTIONS SECTION --}}
                                <div class="d-flex">
                                    <a href="{{ route('employees.show', ['employee' => $data->id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
                                    <a href="{{ route('employees.edit', ['employee' => $data->id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                                    <div>
                                        <form action="{{ route('employees.destroy', ['employee' => $data->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete"
                                                data-name="{{ $data->firstname . ' ' . $data->lastname }}">
                                                <i class="bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
