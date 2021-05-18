import { useSelector } from 'react-redux';

const useRootWarning = () => {
	return useSelector( state => state.environment.provisioned_as_root );
}

export default useRootWarning;
